<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Accueiltemoin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\AccueiltemoinResource;
use App\Http\Resources\AccueiltemoinCollection;
use App\Http\Requests\AccueiltemoinStoreRequest;
use App\Http\Requests\AccueiltemoinUpdateRequest;

class AccueiltemoinController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Accueiltemoin::class);

        $search = $request->get('search', '');

        $accueiltemoins = Accueiltemoin::search($search)
            ->latest()
            ->paginate();

        return new AccueiltemoinCollection($accueiltemoins);
    }

    /**
     * @param \App\Http\Requests\AccueiltemoinStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccueiltemoinStoreRequest $request)
    {
        $this->authorize('create', Accueiltemoin::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $accueiltemoin = Accueiltemoin::create($validated);

        return new AccueiltemoinResource($accueiltemoin);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('view', $accueiltemoin);

        return new AccueiltemoinResource($accueiltemoin);
    }

    /**
     * @param \App\Http\Requests\AccueiltemoinUpdateRequest $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccueiltemoinUpdateRequest $request,
        Accueiltemoin $accueiltemoin
    ) {
        $this->authorize('update', $accueiltemoin);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($accueiltemoin->image) {
                Storage::delete($accueiltemoin->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $accueiltemoin->update($validated);

        return new AccueiltemoinResource($accueiltemoin);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('delete', $accueiltemoin);

        if ($accueiltemoin->image) {
            Storage::delete($accueiltemoin->image);
        }

        $accueiltemoin->delete();

        return response()->noContent();
    }
}
