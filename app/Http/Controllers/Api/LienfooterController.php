<?php

namespace App\Http\Controllers\Api;

use App\Models\Lienfooter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LienfooterResource;
use App\Http\Resources\LienfooterCollection;
use App\Http\Requests\LienfooterStoreRequest;
use App\Http\Requests\LienfooterUpdateRequest;

class LienfooterController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Lienfooter::class);

        $search = $request->get('search', '');

        $lienfooters = Lienfooter::search($search)
            ->latest()
            ->paginate();

        return new LienfooterCollection($lienfooters);
    }

    /**
     * @param \App\Http\Requests\LienfooterStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LienfooterStoreRequest $request)
    {
        $this->authorize('create', Lienfooter::class);

        $validated = $request->validated();

        $lienfooter = Lienfooter::create($validated);

        return new LienfooterResource($lienfooter);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lienfooter $lienfooter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lienfooter $lienfooter)
    {
        $this->authorize('view', $lienfooter);

        return new LienfooterResource($lienfooter);
    }

    /**
     * @param \App\Http\Requests\LienfooterUpdateRequest $request
     * @param \App\Models\Lienfooter $lienfooter
     * @return \Illuminate\Http\Response
     */
    public function update(
        LienfooterUpdateRequest $request,
        Lienfooter $lienfooter
    ) {
        $this->authorize('update', $lienfooter);

        $validated = $request->validated();

        $lienfooter->update($validated);

        return new LienfooterResource($lienfooter);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lienfooter $lienfooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Lienfooter $lienfooter)
    {
        $this->authorize('delete', $lienfooter);

        $lienfooter->delete();

        return response()->noContent();
    }
}
