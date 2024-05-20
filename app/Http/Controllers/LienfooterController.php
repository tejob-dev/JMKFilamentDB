<?php

namespace App\Http\Controllers;

use App\Models\Lienfooter;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.lienfooters.index', compact('lienfooters', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Lienfooter::class);

        return view('app.lienfooters.create');
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

        return redirect()
            ->route('lienfooters.edit', $lienfooter)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lienfooter $lienfooter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Lienfooter $lienfooter)
    {
        $this->authorize('view', $lienfooter);

        return view('app.lienfooters.show', compact('lienfooter'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lienfooter $lienfooter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Lienfooter $lienfooter)
    {
        $this->authorize('update', $lienfooter);

        return view('app.lienfooters.edit', compact('lienfooter'));
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

        return redirect()
            ->route('lienfooters.edit', $lienfooter)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('lienfooters.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
