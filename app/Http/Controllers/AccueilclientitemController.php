<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilclient;
use App\Models\Accueilclientitem;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilclientitems.index',
            compact('accueilclientitems', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilclientitem::class);

        $accueilclients = Accueilclient::pluck('title', 'id');

        return view('app.accueilclientitems.create', compact('accueilclients'));
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

        return redirect()
            ->route('accueilclientitems.edit', $accueilclientitem)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclientitem $accueilclientitem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilclientitem $accueilclientitem)
    {
        $this->authorize('view', $accueilclientitem);

        return view(
            'app.accueilclientitems.show',
            compact('accueilclientitem')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclientitem $accueilclientitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilclientitem $accueilclientitem)
    {
        $this->authorize('update', $accueilclientitem);

        $accueilclients = Accueilclient::pluck('title', 'id');

        return view(
            'app.accueilclientitems.edit',
            compact('accueilclientitem', 'accueilclients')
        );
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

        return redirect()
            ->route('accueilclientitems.edit', $accueilclientitem)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueilclientitems.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
