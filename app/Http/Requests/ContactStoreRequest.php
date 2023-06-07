<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
            'name'            => 'required|min:3|max:40|unique:site_contacts',
            'telephone'       => 'required|min:8|max:15',
            'email'           => 'email|required',
            'reason_id'       => 'required',
            'message'         => 'required|max:200|string',
        ];
    }

}
