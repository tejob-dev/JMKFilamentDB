<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeformationStoreRequest extends FormRequest
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
        ];
    }
}
