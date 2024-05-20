<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilservice;
use App\Models\Accueilserviceitem;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilserviceitems.index',
            compact('accueilserviceitems', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilserviceitem::class);

        $accueilservices = Accueilservice::pluck('title', 'id');

        return view(
            'app.accueilserviceitems.create',
            compact('accueilservices')
        );
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

        return redirect()
            ->route('accueilserviceitems.edit', $accueilserviceitem)
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.accueilserviceitems.show',
            compact('accueilserviceitem')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilserviceitem $accueilserviceitem
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        Accueilserviceitem $accueilserviceitem
    ) {
        $this->authorize('update', $accueilserviceitem);

        $accueilservices = Accueilservice::pluck('title', 'id');

        return view(
            'app.accueilserviceitems.edit',
            compact('accueilserviceitem', 'accueilservices')
        );
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

        return redirect()
            ->route('accueilserviceitems.edit', $accueilserviceitem)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueilserviceitems.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
