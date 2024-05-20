<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Typeformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\TypeformationResource;
use App\Http\Resources\TypeformationCollection;
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
            ->paginate();

        return new TypeformationCollection($typeformations);
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

        return new TypeformationResource($typeformation);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Typeformation $typeformation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Typeformation $typeformation)
    {
        $this->authorize('view', $typeformation);

        return new TypeformationResource($typeformation);
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

        return new TypeformationResource($typeformation);
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

        return response()->noContent();
    }
}
