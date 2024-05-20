<?php

namespace App\Http\Controllers\Api;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipeResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\EquipeCollection;
use App\Http\Requests\EquipeStoreRequest;
use App\Http\Requests\EquipeUpdateRequest;

class EquipeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Equipe::class);

        $search = $request->get('search', '');

        $equipes = Equipe::search($search)
            ->latest()
            ->paginate();

        return new EquipeCollection($equipes);
    }

    /**
     * @param \App\Http\Requests\EquipeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipeStoreRequest $request)
    {
        $this->authorize('create', Equipe::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $equipe = Equipe::create($validated);

        return new EquipeResource($equipe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Equipe $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Equipe $equipe)
    {
        $this->authorize('view', $equipe);

        return new EquipeResource($equipe);
    }

    /**
     * @param \App\Http\Requests\EquipeUpdateRequest $request
     * @param \App\Models\Equipe $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(EquipeUpdateRequest $request, Equipe $equipe)
    {
        $this->authorize('update', $equipe);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($equipe->image) {
                Storage::delete($equipe->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $equipe->update($validated);

        return new EquipeResource($equipe);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Equipe $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Equipe $equipe)
    {
        $this->authorize('delete', $equipe);

        if ($equipe->image) {
            Storage::delete($equipe->image);
        }

        $equipe->delete();

        return response()->noContent();
    }
}
