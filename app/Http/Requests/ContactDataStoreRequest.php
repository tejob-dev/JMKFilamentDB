<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactDataStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nom_prenoms' => 'required|max:255|string',
            'phone' => 'required|max:255|string',
            'email' => 'nullable|email',
            'sujet' => 'nullable|max:255|string',
            'service' => 'nullable|max:255|string',
            'message' => 'nullable|max:255|string',
            'lu_approuve' => 'nullable|max:255|string',
        ];
    }
}
