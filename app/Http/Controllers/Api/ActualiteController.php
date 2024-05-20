<?php

namespace App\Http\Controllers\Api;

use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ActualiteResource;
use App\Http\Resources\ActualiteCollection;
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
            ->paginate();

        return new ActualiteCollection($actualites);
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

        return new ActualiteResource($actualite);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actualite $actualite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Actualite $actualite)
    {
        $this->authorize('view', $actualite);

        return new ActualiteResource($actualite);
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

        return new ActualiteResource($actualite);
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

        return response()->noContent();
    }
}
