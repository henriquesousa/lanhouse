<?php

namespace Validators;

class FuncionarioValidator extends BaseValidator
{
	/**
     * Regras de Validaçao para o Validator.
     *
     * @var array
     */
    protected $rules = [

        'create' => [
            'nome' => ['required', 'min:3'],
            'sobrenome' => ['required'],
            'rg' => ['required'],
            'cpf'    => ['required', 'unique:funcionarios'],
            'civil' => ['required'],
            'username' => ['required', 'min:5', 'alpha_num', 'unique:funcionarios'],
            'password' => ['required', 'min:6'],
            'email'    => ['required', 'email', 'unique:clientes'],
            'phone'    => ['required', 'min:13']
        ],

        'update' => [
            'nome' => ['required', 'min:3'],
            'rg' => ['required'],
            'cpf'    => ['required'],
            'civil' => ['required'],
            'username' => ['required', 'min:5', 'alpha_num'],
            'email'    => ['required', 'email'],
            'phone'    => ['required', 'min:13'],
            '_token'    => ['required']
        ],

        'login' => [
            'username' => ['required'],
            'password' => ['required'],
            '_token' => ['required']
        ]

    ];

    public static function sanitizerFuncionario($input)
    {
        $input['nome'] = ucwords($input['nome']);
        $input['sobrenome'] = ucwords($input['sobrenome']);
        $input['nome'] = $input['nome']." ".$input['sobrenome'];
    }

}



