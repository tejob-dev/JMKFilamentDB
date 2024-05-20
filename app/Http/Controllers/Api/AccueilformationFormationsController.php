<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueilformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;

class AccueilformationFormationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueilformation $accueilformation)
    {
        $this->authorize('view', $accueilformation);

        $search = $request->get('search', '');

        $formations = $accueilformation
            ->formations()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationCollection($formations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueilformation $accueilformation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueilformation $accueilformation)
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
            'imagetitle' => 'nullable|max:255|string',
            'typeformation_id' => 'nullable|exists:typeformations,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = $accueilformation->formations()->create($validated);

        return new FormationResource($formation);
    }
}
