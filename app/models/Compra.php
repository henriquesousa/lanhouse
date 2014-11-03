<?php

class Compra extends \Eloquent 
{
	/**
	 * The database table used deleted_at.
	 *
	 * value true or false
	 */
	protected $softDelete = true;

	
	// Don't forget to fill this array
	protected $fillable = [];

	public function pedido()
    {
        return $this->hasMany('Pedido');
    }

    public function status()
	{
		return $this->belongsTo('Status');
	}

	public function funcionario()
	{
		return $this->belongsTo('Funcionario');
	}

	public function fornecedor()
	{
		return $this->belongsTo('Fornecedor');
	}

}