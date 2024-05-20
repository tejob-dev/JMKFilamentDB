<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilmanager;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccueilmanageritemResource;
use App\Http\Resources\AccueilmanageritemCollection;

class AccueilmanagerAccueilmanageritemsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('view', $accueilmanager);

        $search = $request->get('search', '');

        $accueilmanageritems = $accueilmanager
            ->accueilmanageritems()
            ->search($search)
            ->latest()
            ->paginate();

        return new AccueilmanageritemCollection($accueilmanageritems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilmanager $accueilmanager
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueilmanager $accueilmanager)
    {
        $this->authorize('create', Accueilmanageritem::class);

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'icone' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
        ]);

        $accueilmanageritem = $accueilmanager
            ->accueilmanageritems()
            ->create($validated);

        return new AccueilmanageritemResource($accueilmanageritem);
    }
}
