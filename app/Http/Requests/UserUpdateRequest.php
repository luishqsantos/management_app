<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = ($this->isMethod('PUT') || $this->isMethod('PATCH')) ? ',' . $this->route('user')->id . ',id' : null;

        return [
            'name' => 'required|string|max:255|unique:users,name'.$id,
            'email' => 'required|string|email|max:255|unique:users,email'.$id,
        ];
    }

}
