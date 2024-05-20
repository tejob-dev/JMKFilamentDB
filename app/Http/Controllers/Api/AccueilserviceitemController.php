<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilserviceitem;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccueilserviceitemResource;
use App\Http\Resources\AccueilserviceitemCollection;
use App\Http\Requests\AccueilserviceitemStoreRequest;
use App\Http\Requests\AccueilserviceitemUpdateRequest;

class AccueilserviceitemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilserviceitem::class);

        $search = $request->get('search', '');

        $accueilserviceitems = Accueilserviceitem::search($search)
            ->latest()
            ->paginate();

        return new AccueilserviceitemCollection($accueilserviceitems);
    }

    /**
     * @param \App\Http\Requests\AccueilserviceitemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilserviceitemStoreRequest $request)
    {
        $this->authorize('create', Accueilserviceitem::class);

        $validated = $request->validated();

        $accueilserviceitem = Accueilserviceitem::create($validated);

        return new AccueilserviceitemResource($accueilserviceitem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilserviceitem $accueilserviceitem
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        Accueilserviceitem $accueilserviceitem
    ) {
        $this->authorize('view', $accueilserviceitem);

        return new AccueilserviceitemResource($accueilserviceitem);
    }

    /**
     * @param \App\Http\Requests\AccueilserviceitemUpdateRequest $request
     * @param \App\Models\Accueilserviceitem $accueilserviceitem
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilserviceitemUpdateRequest $request,
        Accueilserviceitem $accueilserviceitem
    ) {
        $this->authorize('update', $accueilserviceitem);

        $validated = $request->validated();

        $accueilserviceitem->update($validated);

        return new AccueilserviceitemResource($accueilserviceitem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilserviceitem $accueilserviceitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Accueilserviceitem $accueilserviceitem
    ) {
        $this->authorize('delete', $accueilserviceitem);

        $accueilserviceitem->delete();

        return response()->noContent();
    }
}
