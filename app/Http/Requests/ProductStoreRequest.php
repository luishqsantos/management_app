<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        //Adiciona a validação base64image a rota post
        $base64Image = ($this->isMethod('POST')) ? '|base64image': '';

        return [
            'name'         => 'required|min:3|max:40',
            'description'  => 'required|min:3|max:2000',
            'provider_id'  => 'exists:providers,id',
            'weight'       => 'numeric|min:0.01',
            'unity_id'     => 'required|integer',
            'quantity'     => 'required|integer',
            'sale_price'   => 'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'min_stock'    => 'required|integer',
            'max_stock'    => 'required|integer',
            'length'       => 'numeric|min:0.01',
            'height'       => 'numeric|min:0.01',
            'width'        => 'numeric|min:0.01',
            'image'        => 'required' .$base64Image,
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'O campo imagem é obrigatório. Ao selecionar a imagem "CLIQUE EM RECORTAR".'
        ];
    }
}
