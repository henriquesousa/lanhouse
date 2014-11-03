<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComprasTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compras', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addForeign('fornecedor_id', 'id', 'fornecedores')
			->addForeign('funcionario_id', 'id', 'funcionarios')
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
		Schema::dropIfExists('compras');
	}

}
