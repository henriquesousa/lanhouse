<?php

namespace Validators;

class ProdutoValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'descricao' => ['required', 'min:6'],
            'quantidade' => ['required', 'numeric'],
            'valor' => ['required'],
            'fornecedor' => ['required', 'numeric'],
            'categoria' => ['required', 'numeric']
        ],

        'update' => [
            'descricao' => ['required', 'min:6'],
            'quantidade' => ['required'],
            'valor' => ['required'],
            'fornecedor' => ['required', 'numeric'],
            'categoria' => ['required', 'numeric']
        ]

    ];

    /**
     * Anexar um padrão sanitizer para esta
     * instancia de validação.
     */
    
}