<?php

// resources/lant/pt/validation.php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
	 | Antes de usar, sete 'locale' para 'pt' em config/app.php
 	 |
    */

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => ':attribute não é uma URL válida.',
    'after'                => ':attribute deve ser uma data depois de :date.',
    'alpha'                => ':attribute somente pode conter letras.',
    'alpha_dash'           => ':attribute somente pode conter letras, números, e hífens.',
    'alpha_num'            => ':attribute somente pode conter letras e números.',
    'array'                => ':attribute deve ser um array.',
    'before'               => ':attribute presa ser uma data antes de :date.',
    'between'              => [
        'numeric' => ':attribute deve ser entre :min e :max.',
        'file'    => ':attribute deve ser entre :min e :max kilobytes.',
        'string'  => ':attribute deve ser entre :min e :max caracteres.',
        'array'   => ':attribute must have between :min e :max itens.',
    ],
    'boolean'              => ':attribute deve ser falso ou verdadeiro',
    'confirmed'            => 'Confirmação de :attribute não confere',
    'date'                 => ':attribute não é uma data válida.',
    'date_format'          => ':attribute não é um formato (:format) válido.',
    'different'            => ':attribute e :other precisam ser diferentes.',
    'digits'               => ':attribute precisa ter :digits digitos.',
    'digits_between'       => ':attribute precisa estar entre :min e :max dígitos.',
    'dimensions'           => ':attribute tem dimensões erradas.',
    'distinct'             => ':attribute contém um valor duplicado.',
    'email'                => ':attribute deve ser um e-mail válido.',
    'exists'               => ':attribute selecionado é inválido.',
    'file'                 => ':attribute deve ser um arquivo.',
    'filled'               => ':attribute field is required.',
    'image'                => ':attribute deve ser uma imagem.',
    'in'                   => ':attribute selecionado é inválido.',
    'in_array'             => 'campo :attribute não existe em :other.',
    'integer'              => ':attribute deve ser um número inteiro.',
    'ip'                   => ':attribute deve ser um endereço IP válido.',
    'json'                 => ':attribute deve ser uma string JSON válida.',
    'max'                  => [
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'    => 'O campo :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O campo :attribute não pode ter mais de :max caracteres.',
        'array'   => 'O campo :attribute não pode ser have more than :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute precisa conter pelo menos :min.',
        'file'    => 'O campo :attribute precisa ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute precisa conter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute precisa ter pelo menos :min itens.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O campo :attribute contém um formato inválido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a não ser que :other esteja em :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values existir.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values existir.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não existir.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values existirem.',
    'same'                 => 'O campo :attribute e :other precisam ser iguais.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve conter :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve conter um fuso horário válido.',
    'unique'               => 'O campo :attribute já existe.',
    'uploaded'             => 'O campo :attribute falhou no upload.',
    'url'                  => 'O formato do campo :attribute não é válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Nomes em português dos atributos, caso eles sejam em inglês ou deseje
    | trocar ele na mensagem.
    |
    */

    'attributes' => [
        'email'             => 'e-mail',
        'name'              => 'nome',
        'password'          => 'senha',
        'password_confirm'  => 'confirmação de senha',
        'message'           => 'mensagem',
        'telephone'         => 'telefone',
        'address'           => 'endereço',
        'reason_id'         => 'motivo',
        'client_id'         => 'cliente',
        'product_id'        => 'produto',
        'amount'            => 'quantidade',
        'description'       => 'descrição',
        'provider_id'       => 'fornnecedor',
        'weight'            => 'peso',
        'unity_id'          => 'unidade',
        'quantity'          => 'quantidade',
        'sale_price'        => 'preço de venda',
        'min_stock'         => 'estoque mínimo',
        'max_stock'         => 'estoque máximo',
        'length'            => 'comprimento',
        'height'            => 'altura',
        'width'             => 'comprimento',
        'unity'             => 'unidade',
        'image'             => 'imagem'
    ],

];
