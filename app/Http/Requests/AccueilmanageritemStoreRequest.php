<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccueilmanageritemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|string',
            'text' => 'nullable|max:255|string',
            'icone' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'accueilmanager_id' => 'nullable|exists:accueilmanagers,id',
        ];
    }
}
