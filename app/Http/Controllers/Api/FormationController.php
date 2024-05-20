<?php

namespace App\Http\Controllers\Api;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;
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
            ->paginate();

        return new FormationCollection($formations);
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

        return new FormationResource($formation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Formation $formation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Formation $formation)
    {
        $this->authorize('view', $formation);

        return new FormationResource($formation);
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

        return new FormationResource($formation);
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

        return response()->noContent();
    }
}
