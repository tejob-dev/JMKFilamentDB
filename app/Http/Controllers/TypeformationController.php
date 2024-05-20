<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeformation;
use App\Http\Requests\TypeformationStoreRequest;
use App\Http\Requests\TypeformationUpdateRequest;

class TypeformationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Typeformation::class);

        $search = $request->get('search', '');

        $typeformations = Typeformation::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.typeformations.index',
            compact('typeformations', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Typeformation::class);

        return view('app.typeformations.create');
    }

    /**
     * @param \App\Http\Requests\TypeformationStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeformationStoreRequest $request)
    {
        $this->authorize('create', Typeformation::class);

        $validated = $request->validated();

        $typeformation = Typeformation::create($validated);

        return redirect()
            ->route('typeformations.edit', $typeformation)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Typeformation $typeformation)
    {
        $this->authorize('view', $typeformation);

        return view('app.typeformations.show', compact('typeformation'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Typeformation $typeformation)
    {
        $this->authorize('update', $typeformation);

        return view('app.typeformations.edit', compact('typeformation'));
    }

    /**
     * @param \App\Http\Requests\TypeformationUpdateRequest $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function update(
        TypeformationUpdateRequest $request,
        Typeformation $typeformation
    ) {
        $this->authorize('update', $typeformation);

        $validated = $request->validated();

        $typeformation->update($validated);

        return redirect()
            ->route('typeformations.edit', $typeformation)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Typeformation $typeformation)
    {
        $this->authorize('delete', $typeformation);

        $typeformation->delete();

        return redirect()
            ->route('typeformations.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
