<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactReplyRequest extends FormRequest
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
            'site_contact_id' => 'required|exists:site_contacts,id',
            'message'         => 'required|max:1000|string',
        ];
    }
}
