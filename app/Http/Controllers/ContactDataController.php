<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ContactData;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactDataStoreRequest;
use App\Http\Requests\ContactDataUpdateRequest;

class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ContactData::class);

        $search = $request->get('search', '');

        $allContactData = ContactData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_contact_data.index',
            compact('allContactData', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ContactData::class);

        return view('app.all_contact_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactDataStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ContactData::class);

        $validated = $request->validated();

        $contactData = ContactData::create($validated);

        return redirect()
            ->route('all-contact-data.edit', $contactData)
            ->withSuccess(__('crud.common.created'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeFront(ContactDataStoreRequest $request): RedirectResponse
    {

        $validated = $request->validated();

        $contactData = ContactData::create($validated);

        return redirect()->to("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ContactData $contactData): View
    {
        $this->authorize('view', $contactData);

        return view('app.all_contact_data.show', compact('contactData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ContactData $contactData): View
    {
        $this->authorize('update', $contactData);

        return view('app.all_contact_data.edit', compact('contactData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ContactDataUpdateRequest $request,
        ContactData $contactData
    ): RedirectResponse {
        $this->authorize('update', $contactData);

        $validated = $request->validated();

        $contactData->update($validated);

        return redirect()
            ->route('all-contact-data.edit', $contactData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ContactData $contactData
    ): RedirectResponse {
        $this->authorize('delete', $contactData);

        $contactData->delete();

        return redirect()
            ->route('all-contact-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
