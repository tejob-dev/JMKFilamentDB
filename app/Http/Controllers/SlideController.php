<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SlideStoreRequest;
use App\Http\Requests\SlideUpdateRequest;

class SlideController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Slide::class);

        $search = $request->get('search', '');

        $slides = Slide::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.slides.index', compact('slides', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Slide::class);

        return view('app.slides.create');
    }

    /**
     * @param \App\Http\Requests\SlideStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideStoreRequest $request)
    {
        $this->authorize('create', Slide::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $slide = Slide::create($validated);

        return redirect()
            ->route('slides.edit', $slide)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Slide $slide)
    {
        $this->authorize('view', $slide);

        return view('app.slides.show', compact('slide'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Slide $slide)
    {
        $this->authorize('update', $slide);

        return view('app.slides.edit', compact('slide'));
    }

    /**
     * @param \App\Http\Requests\SlideUpdateRequest $request
     * @param \App\Models\Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function update(SlideUpdateRequest $request, Slide $slide)
    {
        $this->authorize('update', $slide);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($slide->image) {
                Storage::delete($slide->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $slide->update($validated);

        return redirect()
            ->route('slides.edit', $slide)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Slide $slide)
    {
        $this->authorize('delete', $slide);

        if ($slide->image) {
            Storage::delete($slide->image);
        }

        $slide->delete();

        return redirect()
            ->route('slides.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
