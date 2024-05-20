<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Typeformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActualiteResource;
use App\Http\Resources\ActualiteCollection;

class TypeformationActualitesController extends Controller
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

        $actualites = $typeformation
            ->actualites()
            ->search($search)
            ->latest()
            ->paginate();

        return new ActualiteCollection($actualites);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Typeformation $typeformation)
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
            'accueilactu_id' => 'nullable|exists:accueilactus,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $actualite = $typeformation->actualites()->create($validated);

        return new ActualiteResource($actualite);
    }
}
