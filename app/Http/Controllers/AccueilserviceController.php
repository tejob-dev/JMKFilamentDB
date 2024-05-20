<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilservice;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilservices.index',
            compact('accueilservices', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilservice::class);

        return view('app.accueilservices.create');
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

        return redirect()
            ->route('accueilservices.edit', $accueilservice)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('view', $accueilservice);

        return view('app.accueilservices.show', compact('accueilservice'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('update', $accueilservice);

        return view('app.accueilservices.edit', compact('accueilservice'));
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

        return redirect()
            ->route('accueilservices.edit', $accueilservice)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueilservices.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
