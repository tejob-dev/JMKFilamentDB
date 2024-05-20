<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerUpdateRequest;

class PartnerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Partner::class);

        $search = $request->get('search', '');

        $partners = Partner::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.partners.index', compact('partners', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Partner::class);

        return view('app.partners.create');
    }

    /**
     * @param \App\Http\Requests\PartnerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerStoreRequest $request)
    {
        $this->authorize('create', Partner::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $partner = Partner::create($validated);

        return redirect()
            ->route('partners.edit', $partner)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Partner $partner)
    {
        $this->authorize('view', $partner);

        return view('app.partners.show', compact('partner'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Partner $partner)
    {
        $this->authorize('update', $partner);

        return view('app.partners.edit', compact('partner'));
    }

    /**
     * @param \App\Http\Requests\PartnerUpdateRequest $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        $this->authorize('update', $partner);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($partner->image) {
                Storage::delete($partner->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $partner->update($validated);

        return redirect()
            ->route('partners.edit', $partner)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Partner $partner)
    {
        $this->authorize('delete', $partner);

        if ($partner->image) {
            Storage::delete($partner->image);
        }

        $partner->delete();

        return redirect()
            ->route('partners.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
