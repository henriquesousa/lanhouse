<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addString("descricao")
			->addInteger("quantidade")
			->addForeign('categoria_id', 'id', 'categorias')
			->addForeign('fornecedor_id', 'id', 'fornecedores')
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
		chema::dropIfExists('produtos');
	}

}
