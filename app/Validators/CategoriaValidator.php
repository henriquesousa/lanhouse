<?php

namespace Validators;

class CategoriaValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'descricao' => ['required']
        ],

        'update' => [
            'descricao' => ['required']
        ]

    ];

    
}