<?php

namespace Validators;

class CompraValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'produto' => ['required'],
            'quantidade' => ['required'],
            'valor_unit' => ['required']
        ],

        'update' => [
           'produto' => ['required'],
            'quantidade' => ['required'],
            'valor_unit' => ['required']
        ]

    ];

    /**
     * Anexar um padrão sanitizer para esta
     * instancia de validação.
     */
    
}