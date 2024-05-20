<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Models\Accueiltemoin;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.equipes.index', compact('equipes', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Equipe::class);

        $accueiltemoins = Accueiltemoin::pluck('title', 'id');

        return view('app.equipes.create', compact('accueiltemoins'));
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

        return redirect()
            ->route('equipes.edit', $equipe)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Equipe $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Equipe $equipe)
    {
        $this->authorize('view', $equipe);

        return view('app.equipes.show', compact('equipe'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Equipe $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Equipe $equipe)
    {
        $this->authorize('update', $equipe);

        $accueiltemoins = Accueiltemoin::pluck('title', 'id');

        return view('app.equipes.edit', compact('equipe', 'accueiltemoins'));
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

        return redirect()
            ->route('equipes.edit', $equipe)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('equipes.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
