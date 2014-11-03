<?php

use Validators\ProdutoValidator as ProdutoValidator;

class ProdutosController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of produtos
	 *
	 * @return Response
	 */


	public function lists()
	{
		$produtos = Produto::with("categoria", "fornecedor")->orderBy('descricao', 'ASC')->paginate(15);
		$qtd = count($produtos);

		return View::make('produtos.list', compact('produtos', 'qtd'));
	}

	/**
	 * Show the form for creating a new funcionario
	 *
	 * @return Response
	 */
	public function create()
	{
		 // Show the create produtos form... pega todo os dados para seleção no cadastro
 		$fornecedores = Fornecedor::all();
 		$categorias = Categoria::all();

		return View::make('produtos.create', compact("fornecedores","categorias"));
	}

	/**
	 * Store a newly created produto in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$valor = str_replace(',', '.', $input['valor']);
		
		$validator = new ProdutoValidator;

		if ($validator->validate($input, 'create')) 
		{

					  	// validação OK
			$produto = new Produto();

			$produto->descricao = ucwords(Input::get("descricao"));
			$produto->quantidade = Input::get("quantidade");
			$produto->valor = $valor;
			$produto->categoria_id = Input::get("categoria");
			$produto->fornecedor_id = Input::get("fornecedor");
			$produto->save();
	
			return Redirect::route("produtos");
			
		}
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified produto.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$funci = Produto::find(Input::get('id'));
		return $funci;
	}

	/**
	 * produto
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$produto = Produto::with("fornecedor", "categoria")->find($id);
		$categorias = Categoria::all();
		$fornecedores = Fornecedor::all();

		return View::make('produtos.edit', compact('produto', 'categorias', 'fornecedores'));
	}

	/**
	 * Update the specified produto in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::get();

		$valor = str_replace(',', '.', $input['valor']);

			
		$validator = new ProdutoValidator;

		$produto = Produto::findOrFail($input['id']);

		if ($validator->validate($input, 'update')) 
		{
			// validação OK
			
			$produto->descricao = ucwords(Input::get("descricao"));
			$produto->quantidade = Input::get("quantidade");
			$produto->valor = $valor;
			$produto->categoria_id = Input::get("categoria");
			$produto->fornecedor_id = Input::get("fornecedor");
						$produto->update();


			return Redirect::route('produtos');
			
		}
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified funcionario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$funcionario = Produto::findOrFail($id);
		$funcionario->delete();

		return Redirect::route('produtos');
	}


}