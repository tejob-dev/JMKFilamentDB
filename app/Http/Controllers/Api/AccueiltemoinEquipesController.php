<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueiltemoin;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipeResource;
use App\Http\Resources\EquipeCollection;

class AccueiltemoinEquipesController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('view', $accueiltemoin);

        $search = $request->get('search', '');

        $equipes = $accueiltemoin
            ->equipes()
            ->search($search)
            ->latest()
            ->paginate();

        return new EquipeCollection($equipes);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('create', Equipe::class);

        $validated = $request->validate([
            'section' => 'required|max:255|string',
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
            'imagetitle' => 'nullable|max:255|string',
            'nom_prenom' => 'nullable|max:255|string',
            'fonction' => 'nullable|max:255|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $equipe = $accueiltemoin->equipes()->create($validated);

        return new EquipeResource($equipe);
    }
}
