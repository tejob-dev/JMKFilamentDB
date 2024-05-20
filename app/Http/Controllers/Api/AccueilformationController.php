<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilformationResource;
use App\Http\Resources\AccueilformationCollection;
use App\Http\Requests\AccueilformationStoreRequest;
use App\Http\Requests\AccueilformationUpdateRequest;

class AccueilformationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilformation::class);

        $search = $request->get('search', '');

        $accueilformations = Accueilformation::search($search)
            ->latest()
            ->paginate();

        return new AccueilformationCollection($accueilformations);
    }

    /**
     * @param \App\Http\Requests\AccueilformationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilformationStoreRequest $request)
    {
        $this->authorize('create', Accueilformation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilformation = Accueilformation::create($validated);

        return new AccueilformationResource($accueilformation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilformation $accueilformation)
    {
        $this->authorize('view', $accueilformation);

        return new AccueilformationResource($accueilformation);
    }

    /**
     * @param \App\Http\Requests\AccueilformationUpdateRequest $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilformationUpdateRequest $request,
        Accueilformation $accueilformation
    ) {
        $this->authorize('update', $accueilformation);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilformation->image) {
                Storage::delete($accueilformation->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilformation->update($validated);

        return new AccueilformationResource($accueilformation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Accueilformation $accueilformation
    ) {
        $this->authorize('delete', $accueilformation);

        if ($accueilformation->image) {
            Storage::delete($accueilformation->image);
        }

        $accueilformation->delete();

        return response()->noContent();
    }
}
