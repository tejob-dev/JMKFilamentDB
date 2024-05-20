<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Accueilactu;
use Illuminate\Http\Request;
use App\Models\Typeformation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ActualiteStoreRequest;
use App\Http\Requests\ActualiteUpdateRequest;

class ActualiteController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Actualite::class);

        $search = $request->get('search', '');

        $actualites = Actualite::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.actualites.index', compact('actualites', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Actualite::class);

        $typeformations = Typeformation::pluck('title', 'id');
        $accueilactus = Accueilactu::pluck('title', 'id');

        return view(
            'app.actualites.create',
            compact('typeformations', 'accueilactus')
        );
    }

    /**
     * @param \App\Http\Requests\ActualiteStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActualiteStoreRequest $request)
    {
        $this->authorize('create', Actualite::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $actualite = Actualite::create($validated);

        return redirect()
            ->route('actualites.edit', $actualite)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actualite $actualite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Actualite $actualite)
    {
        $this->authorize('view', $actualite);

        return view('app.actualites.show', compact('actualite'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actualite $actualite
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Actualite $actualite)
    {
        $this->authorize('update', $actualite);

        $typeformations = Typeformation::pluck('title', 'id');
        $accueilactus = Accueilactu::pluck('title', 'id');

        return view(
            'app.actualites.edit',
            compact('actualite', 'typeformations', 'accueilactus')
        );
    }

    /**
     * @param \App\Http\Requests\ActualiteUpdateRequest $request
     * @param \App\Models\Actualite $actualite
     * @return \Illuminate\Http\Response
     */
    public function update(
        ActualiteUpdateRequest $request,
        Actualite $actualite
    ) {
        $this->authorize('update', $actualite);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($actualite->image) {
                Storage::delete($actualite->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $actualite->update($validated);

        return redirect()
            ->route('actualites.edit', $actualite)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actualite $actualite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Actualite $actualite)
    {
        $this->authorize('delete', $actualite);

        if ($actualite->image) {
            Storage::delete($actualite->image);
        }

        $actualite->delete();

        return redirect()
            ->route('actualites.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
