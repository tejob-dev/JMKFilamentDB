<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueilformation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccueilformationStoreRequest;
use App\Http\Requests\AccueilformationUpdateRequest;

class AccueilformationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilformation::class);

        $search = $request->get('search', '');

        $accueilformations = Accueilformation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilformations.index',
            compact('accueilformations', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilformation::class);

        return view('app.accueilformations.create');
    }

    /**
     * @param \App\Http\Requests\AccueilformationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilformationStoreRequest $request)
    {
        $this->authorize('create', Accueilformation::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilformation = Accueilformation::create($validated);

        return redirect()
            ->route('accueilformations.edit', $accueilformation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilformation $accueilformation)
    {
        $this->authorize('view', $accueilformation);

        return view('app.accueilformations.show', compact('accueilformation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilformation $accueilformation)
    {
        $this->authorize('update', $accueilformation);

        return view('app.accueilformations.edit', compact('accueilformation'));
    }

    /**
     * @param \App\Http\Requests\AccueilformationUpdateRequest $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilformationUpdateRequest $request,
        Accueilformation $accueilformation
    ) {
        $this->authorize('update', $accueilformation);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accueilformation->image) {
                Storage::delete($accueilformation->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilformation->update($validated);

        return redirect()
            ->route('accueilformations.edit', $accueilformation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        Accueilformation $accueilformation
    ) {
        $this->authorize('delete', $accueilformation);

        if ($accueilformation->image) {
            Storage::delete($accueilformation->image);
        }

        $accueilformation->delete();

        return redirect()
            ->route('accueilformations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
