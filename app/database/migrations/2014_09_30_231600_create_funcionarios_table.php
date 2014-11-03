<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuncionariosTable extends BaseMigration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('funcionarios', function(Blueprint $table)
		{
			$this
			->setTable($table)
			->addPrimary()
			->addString("nome")
			->addInteger("rg")
			->addInteger("cpf")
			->addString("email")
			->addInteger("phone")
			->addString("username")
			->addString("password")
			->addString("remember_token")
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
		Schema::dropIfExists('funcionarios');
	}

}
