<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilclient;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccueilclientitemResource;
use App\Http\Resources\AccueilclientitemCollection;

class AccueilclientAccueilclientitemsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('view', $accueilclient);

        $search = $request->get('search', '');

        $accueilclientitems = $accueilclient
            ->accueilclientitems()
            ->search($search)
            ->latest()
            ->paginate();

        return new AccueilclientitemCollection($accueilclientitems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilclient $accueilclient
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueilclient $accueilclient)
    {
        $this->authorize('create', Accueilclientitem::class);

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'icone' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueilclientitem = $accueilclient
            ->accueilclientitems()
            ->create($validated);

        return new AccueilclientitemResource($accueilclientitem);
    }
}
