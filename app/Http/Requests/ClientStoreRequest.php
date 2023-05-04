<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
        //Concatena id  a clausula unique caso exista na rota chamada
        //Utilizado caso a rota seja de edição do registro para aceitar que o registro seja inserido novamente
        $id = ($this->isMethod('PUT') || $this->isMethod('PATCH')) ? ',' . $this->route('client')->id . ',id' : null;

        return [
            'name'         => 'required|min:3|max:40|unique:clients,name' . $id,
            'email'        => 'email|unique:clients,email' . $id,
            'telephone'    => 'required|min:8|max:15',
            'address'      => 'required|min:10|max:255'
        ];
    }
}
