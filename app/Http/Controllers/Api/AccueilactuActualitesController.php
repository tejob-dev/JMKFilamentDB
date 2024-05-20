<?php

namespace App\Http\Controllers\Api;

use App\Models\Accueilactu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActualiteResource;
use App\Http\Resources\ActualiteCollection;

class AccueilactuActualitesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('view', $accueilactu);

        $search = $request->get('search', '');

        $actualites = $accueilactu
            ->actualites()
            ->search($search)
            ->latest()
            ->paginate();

        return new ActualiteCollection($actualites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilactu $accueilactu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueilactu $accueilactu)
    {
        $this->authorize('create', Actualite::class);

        $validated = $request->validate([
            'section' => 'required|max:255|string',
            'title' => 'nullable|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
            'imagetitle' => 'nullable|max:255|string',
            'dateactu' => 'nullable|date',
            'managernom' => 'nullable|max:255|string',
            'typeformation_id' => 'nullable|exists:typeformations,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $actualite = $accueilactu->actualites()->create($validated);

        return new ActualiteResource($actualite);
    }
}
