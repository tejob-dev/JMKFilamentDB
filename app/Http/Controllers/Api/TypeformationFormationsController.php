<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Typeformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormationResource;
use App\Http\Resources\FormationCollection;

class TypeformationFormationsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Typeformation $typeformation)
    {
        $this->authorize('view', $typeformation);

        $search = $request->get('search', '');

        $formations = $typeformation
            ->formations()
            ->search($search)
            ->latest()
            ->paginate();

        return new FormationCollection($formations);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Typeformation $typeformation)
    {
        $this->authorize('create', Formation::class);

        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
            'imagetitle' => 'nullable|max:255|string',
            'accueilformation_id' => 'nullable|exists:accueilformations,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $formation = $typeformation->formations()->create($validated);

        return new FormationResource($formation);
    }
}
