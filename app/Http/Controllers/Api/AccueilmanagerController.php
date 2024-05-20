<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilmanager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilmanagerResource;
use App\Http\Resources\AccueilmanagerCollection;
use App\Http\Requests\AccueilmanagerStoreRequest;
use App\Http\Requests\AccueilmanagerUpdateRequest;

class AccueilmanagerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilmanager::class);

        $search = $request->get('search', '');

        $accueilmanagers = Accueilmanager::search($search)
            ->latest()
            ->paginate();

        return new AccueilmanagerCollection($accueilmanagers);
    }

    /**
     * @param \App\Http\Requests\AccueilmanagerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilmanagerStoreRequest $request)
    {
        $this->authorize('create', Accueilmanager::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilmanager = Accueilmanager::create($validated);

        return new AccueilmanagerResource($accueilmanager);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('view', $accueilmanager);

        return new AccueilmanagerResource($accueilmanager);
    }

    /**
     * @param \App\Http\Requests\AccueilmanagerUpdateRequest $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilmanagerUpdateRequest $request,
        Accueilmanager $accueilmanager
    ) {
        $this->authorize('update', $accueilmanager);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilmanager->image) {
                Storage::delete($accueilmanager->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilmanager->update($validated);

        return new AccueilmanagerResource($accueilmanager);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('delete', $accueilmanager);

        if ($accueilmanager->image) {
            Storage::delete($accueilmanager->image);
        }

        $accueilmanager->delete();

        return response()->noContent();
    }
}
