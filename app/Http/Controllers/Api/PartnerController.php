<?php

namespace App\Http\Controllers\Api;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PartnerCollection;
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
            ->paginate();

        return new PartnerCollection($partners);
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

        return new PartnerResource($partner);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Partner $partner)
    {
        $this->authorize('view', $partner);

        return new PartnerResource($partner);
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

        return new PartnerResource($partner);
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

        return response()->noContent();
    }
}
