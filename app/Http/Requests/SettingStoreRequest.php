<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'nom_site' => 'required|max:255|string',
            'logo_site' => 'nullable|image|max:1024',
            'contact_site' => 'nullable|max:255|string',
            'email_site' => 'nullable|max:255|string',
            'defaut_lang' => 'nullable|max:255|string',
            'position_site' => 'nullable|max:255|string',
            'list_social' => 'nullable|max:255|string',
            'lien_contact' => 'nullable|max:255|string',
        ];
    }
}
