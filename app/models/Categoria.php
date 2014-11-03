<?php

class Categoria extends \Eloquent 
{
	/**
	 * The database table used deleted_at.
	 *
	 * value true or false
	 */
	protected $softDelete = true;

	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categorias';

	protected $garded = [
		"id"
	];

	// Don't forget to fill this array
	protected $fillable = [
		"descricao"
	];


	//Relacionamentos

	public function produto()
	{
		return $this->hasMany('Produto');
	}

}