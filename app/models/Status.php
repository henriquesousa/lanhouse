<?php

class Status extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	//Relacionamentos

	public function venda()
	{
		return $this->belongsTo('Venda');
	}

	public function compra()
	{
		return $this->belongsTo('Compra');
	}

}