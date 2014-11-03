<?php

class Fornecedor extends \Eloquent {

	/**
	 * The database table used deleted_at.
	 *
	 * value true or false
	 */
	protected $softDelete = true;

	protected $table = 'fornecedores';
	
	protected $garded = [
		"id",
		"created_at",
		"updated_at",
		"deleted_at"
	];

	// Don't forget to fill this array
	protected $fillable = [];

	//Relacionamentos

	public function produto()
	{
		return $this->hasMany('Produto');
	}

	public function compra()
	{
		return $this->belongsTo('Compra');
	}


}