<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilclient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueilclientResource;
use App\Http\Resources\AccueilclientCollection;
use App\Http\Requests\AccueilclientStoreRequest;
use App\Http\Requests\AccueilclientUpdateRequest;

class AccueilclientController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueilclient::class);

        $search = $request->get('search', '');

        $accueilclients = Accueilclient::search($search)
            ->latest()
            ->paginate();

        return new AccueilclientCollection($accueilclients);
    }

    /**
     * @param \App\Http\Requests\AccueilclientStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueilclientStoreRequest $request)
    {
        $this->authorize('create', Accueilclient::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclient = Accueilclient::create($validated);

        return new AccueilclientResource($accueilclient);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('view', $accueilclient);

        return new AccueilclientResource($accueilclient);
    }

    /**
     * @param \App\Http\Requests\AccueilclientUpdateRequest $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueilclientUpdateRequest $request,
        Accueilclient $accueilclient
    ) {
        $this->authorize('update', $accueilclient);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueilclient->image) {
                Storage::delete($accueilclient->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclient->update($validated);

        return new AccueilclientResource($accueilclient);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('delete', $accueilclient);

        if ($accueilclient->image) {
            Storage::delete($accueilclient->image);
        }

        $accueilclient->delete();

        return response()->noContent();
    }
}
