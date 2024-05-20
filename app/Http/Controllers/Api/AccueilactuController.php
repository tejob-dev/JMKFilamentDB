<?php

namespace App\Http\Controllers\Api;

use App\Models\Accueilactu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilactuResource;
use App\Http\Resources\AccueilactuCollection;
use App\Http\Requests\AccueilactuStoreRequest;
use App\Http\Requests\AccueilactuUpdateRequest;

class AccueilactuController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilactu::class);

        $search = $request->get('search', '');

        $accueilactus = Accueilactu::search($search)
            ->latest()
            ->paginate();

        return new AccueilactuCollection($accueilactus);
    }

    /**
     * @param \App\Http\Requests\AccueilactuStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilactuStoreRequest $request)
    {
        $this->authorize('create', Accueilactu::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilactu = Accueilactu::create($validated);

        return new AccueilactuResource($accueilactu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('view', $accueilactu);

        return new AccueilactuResource($accueilactu);
    }

    /**
     * @param \App\Http\Requests\AccueilactuUpdateRequest $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilactuUpdateRequest $request,
        Accueilactu $accueilactu
    ) {
        $this->authorize('update', $accueilactu);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilactu->image) {
                Storage::delete($accueilactu->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilactu->update($validated);

        return new AccueilactuResource($accueilactu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('delete', $accueilactu);

        if ($accueilactu->image) {
            Storage::delete($accueilactu->image);
        }

        $accueilactu->delete();

        return response()->noContent();
    }
}
