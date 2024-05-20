<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilclientitem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilclientitemResource;
use App\Http\Resources\AccueilclientitemCollection;
use App\Http\Requests\AccueilclientitemStoreRequest;
use App\Http\Requests\AccueilclientitemUpdateRequest;

class AccueilclientitemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilclientitem::class);

        $search = $request->get('search', '');

        $accueilclientitems = Accueilclientitem::search($search)
            ->latest()
            ->paginate();

        return new AccueilclientitemCollection($accueilclientitems);
    }

    /**
     * @param \App\Http\Requests\AccueilclientitemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilclientitemStoreRequest $request)
    {
        $this->authorize('create', Accueilclientitem::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclientitem = Accueilclientitem::create($validated);

        return new AccueilclientitemResource($accueilclientitem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclientitem $accueilclientitem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilclientitem $accueilclientitem)
    {
        $this->authorize('view', $accueilclientitem);

        return new AccueilclientitemResource($accueilclientitem);
    }

    /**
     * @param \App\Http\Requests\AccueilclientitemUpdateRequest $request
     * @param \App\Models\Accueilclientitem $accueilclientitem
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilclientitemUpdateRequest $request,
        Accueilclientitem $accueilclientitem
    ) {
        $this->authorize('update', $accueilclientitem);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilclientitem->image) {
                Storage::delete($accueilclientitem->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclientitem->update($validated);

        return new AccueilclientitemResource($accueilclientitem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclientitem $accueilclientitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Accueilclientitem $accueilclientitem
    ) {
        $this->authorize('delete', $accueilclientitem);

        if ($accueilclientitem->image) {
            Storage::delete($accueilclientitem->image);
        }

        $accueilclientitem->delete();

        return response()->noContent();
    }
}
