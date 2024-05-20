<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accueiltemoin;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.accueiltemoins.index',
            compact('accueiltemoins', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Accueiltemoin::class);

        return view('app.accueiltemoins.create');
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

        return redirect()
            ->route('accueiltemoins.edit', $accueiltemoin)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('view', $accueiltemoin);

        return view('app.accueiltemoins.show', compact('accueiltemoin'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Accueiltemoin $accueiltemoin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Accueiltemoin $accueiltemoin)
    {
        $this->authorize('update', $accueiltemoin);

        return view('app.accueiltemoins.edit', compact('accueiltemoin'));
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

        return redirect()
            ->route('accueiltemoins.edit', $accueiltemoin)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('accueiltemoins.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
