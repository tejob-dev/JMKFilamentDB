<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilclient;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccueilclientStoreRequest;
use App\Http\Requests\AccueilclientUpdateRequest;

class AccueilclientController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilclient::class);

        $search = $request->get('search', '');

        $accueilclients = Accueilclient::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilclients.index',
            compact('accueilclients', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilclient::class);

        return view('app.accueilclients.create');
    }

    /**
     * @param \App\Http\Requests\AccueilclientStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilclientStoreRequest $request)
    {
        $this->authorize('create', Accueilclient::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclient = Accueilclient::create($validated);

        return redirect()
            ->route('accueilclients.edit', $accueilclient)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('view', $accueilclient);

        return view('app.accueilclients.show', compact('accueilclient'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('update', $accueilclient);

        return view('app.accueilclients.edit', compact('accueilclient'));
    }

    /**
     * @param \App\Http\Requests\AccueilclientUpdateRequest $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilclientUpdateRequest $request,
        Accueilclient $accueilclient
    ) {
        $this->authorize('update', $accueilclient);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accueilclient->image) {
                Storage::delete($accueilclient->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclient->update($validated);

        return redirect()
            ->route('accueilclients.edit', $accueilclient)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('delete', $accueilclient);

        if ($accueilclient->image) {
            Storage::delete($accueilclient->image);
        }

        $accueilclient->delete();

        return redirect()
            ->route('accueilclients.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
