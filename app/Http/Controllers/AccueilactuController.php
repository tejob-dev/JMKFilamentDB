<?php

namespace App\Http\Controllers;

use App\Models\Accueilactu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilactus.index',
            compact('accueilactus', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilactu::class);

        return view('app.accueilactus.create');
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

        return redirect()
            ->route('accueilactus.edit', $accueilactu)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('view', $accueilactu);

        return view('app.accueilactus.show', compact('accueilactu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('update', $accueilactu);

        return view('app.accueilactus.edit', compact('accueilactu'));
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

        return redirect()
            ->route('accueilactus.edit', $accueilactu)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueilactus.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
