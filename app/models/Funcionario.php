<?php

class Funcionario extends Eloquent 
{

	/**
	 * The database table used deleted_at.
	 *
	 * value true or false
	 */
	protected $softDelete = true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'funcionarios';

	protected $garded = [
		"id",
		"password",
		"created_at",
		"updated_at",
		"deleted_at"
	];

	// Don't forget to fill this array
	protected $fillable = [
		"nome",
		"rg",
		"cpf",
		"civil",
		"username",
		"email",
		"phone"
	];


	


	//Relacionamentos

	public function venda()
    {
        return $this->hasMany('Venda');
    }

    public function compra()
    {
        return $this->hasMany('Compra');
    }


    

}