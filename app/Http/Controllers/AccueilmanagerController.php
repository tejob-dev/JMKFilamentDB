<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilmanager;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccueilmanagerStoreRequest;
use App\Http\Requests\AccueilmanagerUpdateRequest;

class AccueilmanagerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilmanager::class);

        $search = $request->get('search', '');

        $accueilmanagers = Accueilmanager::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilmanagers.index',
            compact('accueilmanagers', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilmanager::class);

        return view('app.accueilmanagers.create');
    }

    /**
     * @param \App\Http\Requests\AccueilmanagerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilmanagerStoreRequest $request)
    {
        $this->authorize('create', Accueilmanager::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilmanager = Accueilmanager::create($validated);

        return redirect()
            ->route('accueilmanagers.edit', $accueilmanager)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('view', $accueilmanager);

        return view('app.accueilmanagers.show', compact('accueilmanager'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('update', $accueilmanager);

        return view('app.accueilmanagers.edit', compact('accueilmanager'));
    }

    /**
     * @param \App\Http\Requests\AccueilmanagerUpdateRequest $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilmanagerUpdateRequest $request,
        Accueilmanager $accueilmanager
    ) {
        $this->authorize('update', $accueilmanager);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accueilmanager->image) {
                Storage::delete($accueilmanager->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilmanager->update($validated);

        return redirect()
            ->route('accueilmanagers.edit', $accueilmanager)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('delete', $accueilmanager);

        if ($accueilmanager->image) {
            Storage::delete($accueilmanager->image);
        }

        $accueilmanager->delete();

        return redirect()
            ->route('accueilmanagers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
