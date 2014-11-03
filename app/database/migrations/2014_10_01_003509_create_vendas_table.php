<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVendasTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendas', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addForeign('cliente_id', 'id', 'clientes')
			->addForeign('funcionario_id', 'id', 'funcionarios')
			->addForeign('status_id', 'id', 'status')
			->addFloat('valor')
			->addTimestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('vendas');
	}

}
