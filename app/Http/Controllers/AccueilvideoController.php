<?php

namespace App\Http\Controllers;

use App\Models\Accueilvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AccueilvideoStoreRequest;
use App\Http\Requests\AccueilvideoUpdateRequest;

class AccueilvideoController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilvideo::class);

        $search = $request->get('search', '');

        $accueilvideos = Accueilvideo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueilvideos.index',
            compact('accueilvideos', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueilvideo::class);

        return view('app.accueilvideos.create');
    }

    /**
     * @param \App\Http\Requests\AccueilvideoStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilvideoStoreRequest $request)
    {
        $this->authorize('create', Accueilvideo::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilvideo = Accueilvideo::create($validated);

        return redirect()
            ->route('accueilvideos.edit', $accueilvideo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilvideo $accueilvideo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilvideo $accueilvideo)
    {
        $this->authorize('view', $accueilvideo);

        return view('app.accueilvideos.show', compact('accueilvideo'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilvideo $accueilvideo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueilvideo $accueilvideo)
    {
        $this->authorize('update', $accueilvideo);

        return view('app.accueilvideos.edit', compact('accueilvideo'));
    }

    /**
     * @param \App\Http\Requests\AccueilvideoUpdateRequest $request
     * @param \App\Models\Accueilvideo $accueilvideo
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilvideoUpdateRequest $request,
        Accueilvideo $accueilvideo
    ) {
        $this->authorize('update', $accueilvideo);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($accueilvideo->image) {
                Storage::delete($accueilvideo->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilvideo->update($validated);

        return redirect()
            ->route('accueilvideos.edit', $accueilvideo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilvideo $accueilvideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilvideo $accueilvideo)
    {
        $this->authorize('delete', $accueilvideo);

        if ($accueilvideo->image) {
            Storage::delete($accueilvideo->image);
        }

        $accueilvideo->delete();

        return redirect()
            ->route('accueilvideos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
