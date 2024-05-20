<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilmanager;
use App\Models\Accueilmanageritem;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilmanageritems.index',
            compact('accueilmanageritems', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilmanageritem::class);

        $accueilmanagers = Accueilmanager::pluck('title', 'id');

        return view(
            'app.accueilmanageritems.create',
            compact('accueilmanagers')
        );
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

        return redirect()
            ->route('accueilmanageritems.edit', $accueilmanageritem)
            ->withSuccess(__('crud.common.created'));
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

        return view(
            'app.accueilmanageritems.show',
            compact('accueilmanageritem')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanageritem $accueilmanageritem
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Request $request,
        Accueilmanageritem $accueilmanageritem
    ) {
        $this->authorize('update', $accueilmanageritem);

        $accueilmanagers = Accueilmanager::pluck('title', 'id');

        return view(
            'app.accueilmanageritems.edit',
            compact('accueilmanageritem', 'accueilmanagers')
        );
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

        return redirect()
            ->route('accueilmanageritems.edit', $accueilmanageritem)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueilmanageritems.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
