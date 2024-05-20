<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualiteUpdateRequest extends FormRequest
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
            'section' => 'required|max:255|string',
            'title' => 'nullable|max:255|string',
            'text' => 'nullable|max:255|string',
            'boutontitre' => 'nullable|max:255|string',
            'boutonlien' => 'nullable|max:255|string',
            'image' => 'nullable|image|max:1024',
            'imagetitle' => 'nullable|max:255|string',
            'dateactu' => 'nullable|date',
            'managernom' => 'nullable|max:255|string',
            'typeformation_id' => 'nullable|exists:typeformations,id',
            'accueilactu_id' => 'nullable|exists:accueilactus,id',
        ];
    }
}
