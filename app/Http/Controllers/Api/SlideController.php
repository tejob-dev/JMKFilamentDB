<?php

namespace App\Http\Controllers\Api;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;
use App\Http\Resources\SlideCollection;
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
            ->paginate();

        return new SlideCollection($slides);
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

        return new SlideResource($slide);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slide $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Slide $slide)
    {
        $this->authorize('view', $slide);

        return new SlideResource($slide);
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

        return new SlideResource($slide);
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

        return response()->noContent();
    }
}
