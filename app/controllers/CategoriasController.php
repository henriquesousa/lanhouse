<?php

use Validators\CategoriaValidator as CategoriaValidator;

class CategoriasController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of categorias
	 *
	 * @return Response
	 */


	public function lists()
	{
		$categorias = Categoria::orderBy('descricao', 'ASC')->paginate(15);
		$qtd = count($categorias);

		return View::make('categorias.list', compact('categorias', 'qtd'));
	}

	/**
	 * Show the form for creating a new categoria
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('categorias.create');			
	}

	/**
	 * Store a newly created categoria in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new CategoriaValidator;

		if ($validator->validate($input, 'create')) 
		{
		  	// validação OK
			$categoria = new Categoria();

			$categoria->descricao = ucwords(Input::get("descricao"));
			$categoria->save();


			return Redirect::route("categorias");
		}
	}

	/**
	 * Display the specified categoria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = Categoria::find(Input::get('id'));
		return $categoria;
	}

	/**
	 * categoria
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = Categoria::find($id);

		return View::make('categorias.edit', compact('categoria'));
	}

	/**
	 * Update the specified categoria in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::get();
		
		$validator = new CategoriaValidator;

		$categoria = Categoria::findOrFail($input['id']);

		if ($validator->validate($input, 'update')) 
		{
			// validação OK
			
			$categoria->descricao = ucwords(Input::get("descricao"));
			$categoria->update();


			return Redirect::route('categorias');
			
		}
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified categoria from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categoria = Categoria::findOrFail($id);
		$categoria->delete();

		return Redirect::route('categorias');
	}


}