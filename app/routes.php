<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'UserController@login');

Route::get('/index', 'UserController@login');

Route::get('/sobre', function()
{
	return View::make('about');
});


/*
| Metodos da Classe UserController
*/
Route::any('/login',[
		"as"   => "login",
		"uses" => "UserController@login"
]);

Route::any('/logando',[
	"as"   => "logon",
	"uses" => "UserController@logon"
]);


Route::get('/logout', 'UserController@logout');
//--------------------------------------


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	
	Route::get('/index', 'HomeController@index');
	Route::get('/', 'HomeController@index');

	
	/*
	| Rotas para Funcionários
	*/

	Route::any('/funcionarioo', function()
	{
		return View::make('funcionarios.index');
	});

	Route::any('/funcionarios',[
		"as"   => "funcionarios",
		"uses" => "FuncionariosController@lists"
	]);

	Route::any("/funcionario/add", [
		"as" => "funcionario_add",
		"uses" => "FuncionariosController@create"
	]);

	Route::any("/funcionario/store", [
		"as" => "funcionario_store",
		"uses" => "FuncionariosController@store"
	]);

	Route::any('/funcionario/{id}',[
		"as"   => "funcionario",
		"uses" => "FuncionariosController@show"
	]);

	Route::any("/funcionario/edit/{id}", [
		"as" => "funcionario_editar",
		"uses" => "FuncionariosController@edit"
	]);

	Route::any("/funcionario/update/{id}", [
		"as" => "funcionario_update",
		"uses" => "FuncionariosController@update"
	]);

	Route::any("/funcionario/delete/{id}", [
		"as" => "funcionario_delete",
		"uses" => "FuncionariosController@destroy"
	]);

	/*
		Rotas para Clientes
	*/

	Route::any('/cliente',[
		"as"   => "clientes",
		"uses" => "ClientesController@lists"
	]);

	Route::any("/cliente/add", [
		"as" => "cliente_add",
		"uses" => "ClientesController@create"
	]);

	Route::any('/cliente/{id}',[
		"as"   => "cliente",
		"uses" => "ClientesController@show"
	]);

	Route::any("/cliente/store", [
		"as" => "cliente_store",
		"uses" => "ClientesController@store"
	]);

	Route::any("/cliente/edit/{id}", [
		"as" => "cliente_edit",
		"uses" => "ClientesController@edit"
	]);

	Route::any("/cliente/update/{id}", [
		"as" => "cliente_update",
		"uses" => "ClientesController@update"
	]);

	Route::any("/cliente/delete/{id}", [
		"as" => "cliente_delete",
		"uses" => "ClientesController@destroy"
	]);


	/*
		Rotas para Fornecedores
	*/

	Route::any('/fornecedor',[
		"as"   => "fornecedores",
		"uses" => "FornecedoresController@lists"
	]);

	Route::any("/fornecedor/add", [
		"as" => "fornecedor_add",
		"uses" => "FornecedoresController@create"
	]);

	Route::any('/fornecedor/{id}',[
		"as"   => "fornecedor",
		"uses" => "FornecedoresController@show"
	]);

	Route::any("/fornecedor/store", [
		"as" => "fornecedor_store",
		"uses" => "FornecedoresController@store"
	]);

	Route::any("/fornecedor/edit/{id}", [
		"as" => "fornecedor_edit",
		"uses" => "FornecedoresController@edit"
	]);

	Route::any("/fornecedor/update/{id}", [
		"as" => "fornecedor_update",
		"uses" => "FornecedoresController@update"
	]);

	Route::any("/fornecedor/delete/{id}", [
		"as" => "fornecedor_delete",
		"uses" => "FornecedoresController@destroy"
	]);



	/*
		Rotas para Produtos
	*/

	Route::any('/produto',[
		"as"   => "produtos",
		"uses" => "ProdutosController@lists"
	]);

	Route::any("/produto/add", [
		"as" => "produto_add",
		"uses" => "ProdutosController@create"
	]);

	Route::any("/produto/store", [
		"as" => "produto_store",
		"uses" => "ProdutosController@store"
	]);

	Route::any('/produto/{id}',[
		"as"   => "produto",
		"uses" => "ProdutosController@show"
	]);

	Route::any("/produto/edit/{id}", [
		"as" => "produto_edit",
		"uses" => "ProdutosController@edit"
	]);

	Route::any("/produto/update/{id}", [
		"as" => "produto_update",
		"uses" => "ProdutosController@update"
	]);

	Route::any("/produto/delete/{id}", [
		"as" => "produto_delete",
		"uses" => "ProdutosController@destroy"
	]);


	/*
		Rotas para Categorias
	*/

	Route::any('/categorias',[
		"as"   => "categorias",
		"uses" => "CategoriasController@lists"
	]);

	Route::any("/categorias/add", [
		"as" => "categoria_add",
		"uses" => "CategoriasController@create"
	]);

	Route::any("/categorias/store", [
		"as" => "categoria_store",
		"uses" => "CategoriasController@store"
	]);

	Route::any("/categorias/edit/{id}", [
		"as" => "categoria_edit",
		"uses" => "CategoriasController@edit"
	]);

	Route::any("/categorias/update/{id}", [
		"as" => "categoria_update",
		"uses" => "CategoriasController@update"
	]);

	Route::any("/categorias/delete/{id}", [
		"as" => "categoria_delete",
		"uses" => "CategoriasController@destroy"
	]);


	Route::any('/categorias/{id}',[
		"as"   => "categoria",
		"uses" => "CategoriasController@show"
	]);


	/*
		Rotas para Compras 
	*/

	Route::any('/compras',[
		"as"   => "compras",
		"uses" => "ComprasController@lists"
	]);

	Route::any("/compras/add", [
		"as" => "compra_add",
		"uses" => "ComprasController@create"
	]);

	Route::any("/compras/store/{id}", [
		"as" => "compra_store",
		"uses" => "ComprasController@store"
	]);

	Route::any("/compras/edit/{id}", [
		"as" => "compra_edit",
		"uses" => "ComprasController@edit"
	]);

	Route::any("/compras/update/{id}", [
		"as" => "compra_update",
		"uses" => "ComprasController@update"
	]);

	Route::any("/compras/delete/{id}", [
		"as" => "compra_delete",
		"uses" => "ComprasController@destroy"
	]);


	Route::any('/compras/{id}',[
		"as"   => "compra",
		"uses" => "ComprasController@show"
	]);


	//pedido está na mesma camada d compra
	Route::any("/compras/pedido/edit/{id}", [
		"as" => "compra_pedit",
		"uses" => "ComprasController@pedit"
	]);

	Route::any("/compras/pedido/update", [
		"as" => "pedido_update",
		"uses" => "ComprasController@pupdate"
	]);

	Route::any("/compras/pedido/add/{id}", [
		"as" => "pedido_padd",
		"uses" => "ComprasController@pcreate"
	]);

	Route::any("/compras/pedido/store/{id}", [
		"as" => "pedido_pstore",
		"uses" => "ComprasController@pstore"
	]);

	Route::any("/compras/pedido/delete/{id}", [
		"as" => "compra_pdelete",
		"uses" => "ComprasController@pdestroy"
	]);

	

});