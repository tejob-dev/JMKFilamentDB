<?php

namespace App\Http\Controllers\Api;

use App\Models\Accueilabout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilaboutResource;
use App\Http\Resources\AccueilaboutCollection;
use App\Http\Requests\AccueilaboutStoreRequest;
use App\Http\Requests\AccueilaboutUpdateRequest;

class AccueilaboutController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilabout::class);

        $search = $request->get('search', '');

        $accueilabouts = Accueilabout::search($search)
            ->latest()
            ->paginate();

        return new AccueilaboutCollection($accueilabouts);
    }

    /**
     * @param \App\Http\Requests\AccueilaboutStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilaboutStoreRequest $request)
    {
        $this->authorize('create', Accueilabout::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilabout = Accueilabout::create($validated);

        return new AccueilaboutResource($accueilabout);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilabout $accueilabout)
    {
        $this->authorize('view', $accueilabout);

        return new AccueilaboutResource($accueilabout);
    }

    /**
     * @param \App\Http\Requests\AccueilaboutUpdateRequest $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilaboutUpdateRequest $request,
        Accueilabout $accueilabout
    ) {
        $this->authorize('update', $accueilabout);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilabout->image) {
                Storage::delete($accueilabout->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilabout->update($validated);

        return new AccueilaboutResource($accueilabout);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilabout $accueilabout)
    {
        $this->authorize('delete', $accueilabout);

        if ($accueilabout->image) {
            Storage::delete($accueilabout->image);
        }

        $accueilabout->delete();

        return response()->noContent();
    }
}
