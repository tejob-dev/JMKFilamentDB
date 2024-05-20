<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilmanageritem;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccueilmanageritemResource;
use App\Http\Resources\AccueilmanageritemCollection;
use App\Http\Requests\AccueilmanageritemStoreRequest;
use App\Http\Requests\AccueilmanageritemUpdateRequest;

class AccueilmanageritemController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilmanageritem::class);

        $search = $request->get('search', '');

        $accueilmanageritems = Accueilmanageritem::search($search)
            ->latest()
            ->paginate();

        return new AccueilmanageritemCollection($accueilmanageritems);
    }

    /**
     * @param \App\Http\Requests\AccueilmanageritemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilmanageritemStoreRequest $request)
    {
        $this->authorize('create', Accueilmanageritem::class);

        $validated = $request->validated();

        $accueilmanageritem = Accueilmanageritem::create($validated);

        return new AccueilmanageritemResource($accueilmanageritem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanageritem $accueilmanageritem
     * @return \Illuminate\Http\Response
     */
    public function show(
        Request $request,
        Accueilmanageritem $accueilmanageritem
    ) {
        $this->authorize('view', $accueilmanageritem);

        return new AccueilmanageritemResource($accueilmanageritem);
    }

    /**
     * @param \App\Http\Requests\AccueilmanageritemUpdateRequest $request
     * @param \App\Models\Accueilmanageritem $accueilmanageritem
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilmanageritemUpdateRequest $request,
        Accueilmanageritem $accueilmanageritem
    ) {
        $this->authorize('update', $accueilmanageritem);

        $validated = $request->validated();

        $accueilmanageritem->update($validated);

        return new AccueilmanageritemResource($accueilmanageritem);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanageritem $accueilmanageritem
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Accueilmanageritem $accueilmanageritem
    ) {
        $this->authorize('delete', $accueilmanageritem);

        $accueilmanageritem->delete();

        return response()->noContent();
    }
}
