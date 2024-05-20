<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilservice;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccueilserviceitemResource;
use App\Http\Resources\AccueilserviceitemCollection;

class AccueilserviceAccueilserviceitemsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('view', $accueilservice);

        $search = $request->get('search', '');

        $accueilserviceitems = $accueilservice
            ->accueilserviceitems()
            ->search($search)
            ->latest()
            ->paginate();

        return new AccueilserviceitemCollection($accueilserviceitems);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilservice $accueilservice
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueilservice $accueilservice)
    {
        $this->authorize('create', Accueilserviceitem::class);

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'subservice' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
        ]);

        $accueilserviceitem = $accueilservice
            ->accueilserviceitems()
            ->create($validated);

        return new AccueilserviceitemResource($accueilserviceitem);
    }
}
