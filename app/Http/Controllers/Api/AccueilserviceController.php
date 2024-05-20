<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilservice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilserviceResource;
use App\Http\Resources\AccueilserviceCollection;
use App\Http\Requests\AccueilserviceStoreRequest;
use App\Http\Requests\AccueilserviceUpdateRequest;

class AccueilserviceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilservice::class);

        $search = $request->get('search', '');

        $accueilservices = Accueilservice::search($search)
            ->latest()
            ->paginate();

        return new AccueilserviceCollection($accueilservices);
    }

    /**
     * @param \App\Http\Requests\AccueilserviceStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilserviceStoreRequest $request)
    {
        $this->authorize('create', Accueilservice::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilservice = Accueilservice::create($validated);

        return new AccueilserviceResource($accueilservice);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('view', $accueilservice);

        return new AccueilserviceResource($accueilservice);
    }

    /**
     * @param \App\Http\Requests\AccueilserviceUpdateRequest $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilserviceUpdateRequest $request,
        Accueilservice $accueilservice
    ) {
        $this->authorize('update', $accueilservice);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilservice->image) {
                Storage::delete($accueilservice->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilservice->update($validated);

        return new AccueilserviceResource($accueilservice);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('delete', $accueilservice);

        if ($accueilservice->image) {
            Storage::delete($accueilservice->image);
        }

        $accueilservice->delete();

        return response()->noContent();
    }
}
