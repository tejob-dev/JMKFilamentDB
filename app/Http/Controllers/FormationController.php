<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Typeformation;
use App\Models\Accueilformation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdateRequest;

class FormationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Formation::class);

        $search = $request->get('search', '');

        $formations = Formation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.formations.index', compact('formations', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Formation::class);

        $typeformations = Typeformation::pluck('title', 'id');
        $accueilformations = Accueilformation::pluck('title', 'id');

        return view(
            'app.formations.create',
            compact('typeformations', 'accueilformations')
        );
    }

    /**
     * @param \App\Http\Requests\FormationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormationStoreRequest $request)
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = Formation::create($validated);

        return redirect()
            ->route('formations.edit', $formation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Formation $formation)
    {
        $this->authorize('view', $formation);

        return view('app.formations.show', compact('formation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Formation $formation)
    {
        $this->authorize('update', $formation);

        $typeformations = Typeformation::pluck('title', 'id');
        $accueilformations = Accueilformation::pluck('title', 'id');

        return view(
            'app.formations.edit',
            compact('formation', 'typeformations', 'accueilformations')
        );
    }

    /**
     * @param \App\Http\Requests\FormationUpdateRequest $request
     * @param \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function update(
        FormationUpdateRequest $request,
        Formation $formation
    ) {
        $this->authorize('update', $formation);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($formation->image) {
                Storage::delete($formation->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $formation->update($validated);

        return redirect()
            ->route('formations.edit', $formation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Formation $formation)
    {
        $this->authorize('delete', $formation);

        if ($formation->image) {
            Storage::delete($formation->image);
        }

        $formation->delete();

        return redirect()
            ->route('formations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
