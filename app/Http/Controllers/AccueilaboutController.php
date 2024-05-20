<?php

namespace App\Http\Controllers;

use App\Models\Accueilabout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccueilaboutStoreRequest;
use App\Http\Requests\AccueilaboutUpdateRequest;

class AccueilaboutController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilabout::class);

        $search = $request->get('search', '');

        $accueilabouts = Accueilabout::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilabouts.index',
            compact('accueilabouts', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilabout::class);

        return view('app.accueilabouts.create');
    }

    /**
     * @param \App\Http\Requests\AccueilaboutStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilaboutStoreRequest $request)
    {
        $this->authorize('create', Accueilabout::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilabout = Accueilabout::create($validated);

        return redirect()
            ->route('accueilabouts.edit', $accueilabout)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilabout $accueilabout)
    {
        $this->authorize('view', $accueilabout);

        return view('app.accueilabouts.show', compact('accueilabout'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilabout $accueilabout)
    {
        $this->authorize('update', $accueilabout);

        return view('app.accueilabouts.edit', compact('accueilabout'));
    }

    /**
     * @param \App\Http\Requests\AccueilaboutUpdateRequest $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilaboutUpdateRequest $request,
        Accueilabout $accueilabout
    ) {
        $this->authorize('update', $accueilabout);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accueilabout->image) {
                Storage::delete($accueilabout->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilabout->update($validated);

        return redirect()
            ->route('accueilabouts.edit', $accueilabout)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilabout $accueilabout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilabout $accueilabout)
    {
        $this->authorize('delete', $accueilabout);

        if ($accueilabout->image) {
            Storage::delete($accueilabout->image);
        }

        $accueilabout->delete();

        return redirect()
            ->route('accueilabouts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
