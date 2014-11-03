<?php

class Pedido extends \Eloquent 
{

	/**
	 * The database table used deleted_at.
	 *
	 * value true or false
	 */
	protected $softDelete = true;

	protected $table = 'pedidos';

	protected $garded = [
		"id",
		"created_at",
		"updated_at",
		"deleted_at"
	];

	// Don't forget to fill this array
	protected $fillable = [];

	//Relacionamentos

	public function compra()
    {
        return $this->belongsTo('Compra');
    }

    public function produto()
    {
        return $this->belongsTo('Produto');
    }

}