<?php
use Validators\CompraValidator as CompraValidator;

class ComprasController extends BaseController {

	/**
	 * Display a listing of compras
	 *
	 * @return Response
	 */
	public function lists()
	{
		$compras = Compra::orderBy('id', 'ASC')->paginate(15);
		$qtd = count($compras);

		return View::make('compras.list', compact('compras', 'qtd'));
	}
	/**
	 * Show the form for creating a new compra
	 *
	 * @return Response
	 */
	public function create()
	{
		$produtos = Produto::all();
		
		return View::make('compras.create', compact('produtos'));
	}

	public function pcreate($id)
	{
		$cp = $id;
		$produtos = Produto::all();
		
		return View::make('compras.pedido_create', compact('produtos', 'cp'));
	}

	/**
	 * Store a newly created compra in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();

		$valor_unit = str_replace(',', '.', Input::get('valor_unit'));

		$validator = new CompraValidator;

		if ($validator->validate($input, 'create')) 
		{
			
				$produto = Produto::with('fornecedor')->find($input['produto']);
			  	// validação OK
				if(Input::get('cp') != '')
			  	{
			  		$compra = Compra::find(Input::get('cp'));

			  		$pedido = new Pedido();

					$pedido->produto_id = Input::get("produto");
					$pedido->valor_unit = $valor_unit;
					$pedido->quantidade = Input::get("quantidade");
					$pedido->compra_id = Input::get('cp');
					$pedido->save();

					$compra->valor = $compra->valor + ($pedido->quantidade * $pedido->valor_unit);
					$compra->save();
			  	}
			  	else
			  	{
			  		$compra = new Compra();
			  	
					$compra->fornecedor_id = $produto->fornecedor->id;
					$compra->funcionario_id = Auth::user()->id;
					$compra->valor = $valor_unit * Input::get("quantidade");
					$compra->status_id = 1;
					$compra->save();


					$pedido = new Pedido();

					$pedido->produto_id = Input::get("produto");
					$pedido->valor_unit = $valor_unit;
					$pedido->quantidade = Input::get("quantidade");
					$pedido->compra_id = $compra->id;
					$pedido->save();
				}

				$produtos = Produto::all();
				$cp = $compra->id;			


				return View::make('compras.create', compact('produtos', 'cp'));
			
		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
			

	}


	public function pstore()
	{

		$input = Input::all();

		$valor_unit = str_replace(',', '.', Input::get('valor_unit'));

		$validator = new CompraValidator;

		if ($validator->validate($input, 'create')) 
		{
			
				$produto = Produto::with('fornecedor')->find($input['produto']);
			  	// validação OK
				if(Input::get('cp') != '')
			  	{
			  		
			  		$pedido = new Pedido();

					$pedido->produto_id = Input::get("produto");
					$pedido->valor_unit = $valor_unit;
					$pedido->quantidade = Input::get("quantidade");
					$pedido->compra_id = Input::get('cp');
					$pedido->save();

					$compra = Compra::find(Input::get('cp'));
					$compra->valor = $compra->valor + ($valor_unit * Input::get("quantidade"));
					$compra->save();					
			  	}
			  	else
			  	{
			  		$compra = new Compra();
			  	
					$compra->fornecedor_id = $produto->fornecedor->id;
					$compra->funcionario_id = Auth::user()->id;
					$compra->valor = $valor_unit * Input::get("quantidade");
					$compra->status_id = 1;
					$compra->save();


					$pedido = new Pedido();

					$pedido->produto_id = Input::get("produto");
					$pedido->valor_unit = $valor_unit;
					$pedido->quantidade = Input::get("quantidade");
					$pedido->compra_id = $compra->id;
					$pedido->save();
				}

				$cp = Input::get('cp');			

				$pedido = Pedido::with('produto')->where('compra_id', '=', $cp)->paginate(10);
				$compra = $cp;
				$qtd = count($pedido);

				return View::make('compras.edit', compact('pedido', 'compra', 'qtd'));
			
		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
			

	}

	
	/**
	 * Display the specified compra.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$compra = Compra::findOrFail($id);

		return View::make('compras.show', compact('compra'));
	}

	/**
	 * Show the form for editing the specified compra.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pedido = Pedido::with('produto')->where('compra_id', '=', $id)->paginate(10);
		$compra = $id;
		$qtd = count($pedido);

		return View::make('compras.edit', compact('pedido', 'compra', 'qtd'));
	}

	public function pedit($id)
	{
		$pedido = Pedido::find($id);
		$compra = $pedido->compra_id;
		$produtos = Produto::all();

		return View::make('compras.pedido_edit', compact('pedido', 'produtos', 'compra', 'qtd'));
	}

	public function pupdate()
	{
		$input = Input::all();
		//dd($input);
		$valor_unit = str_replace(',', '.', Input::get('valor_unit'));

		$validator = new CompraValidator;

		if ($validator->validate($input, 'create')) 
		{
			
// validação OK
				
			  		$pedido = Pedido::find(Input::get('pedido'));

			  		$descont = $pedido->valor_unit * $pedido->quantidade;

					$pedido->produto_id = Input::get("produto");
					$pedido->valor_unit = $valor_unit;
					$pedido->quantidade = Input::get("quantidade");
					$pedido->compra_id = Input::get('cp');
					$pedido->save();

					$compra = Compra::find($pedido->compra->id);
					$compra->valor = ($compra->valor - $descont)+($pedido->valor_unit * $pedido->quantidade);
					$compra->save();


				$produtos = Produto::all();
				$cp = Input::get('cp');;			

				return Redirect::route('compra_edit', array($cp));
				//return View::make('compras.create', compact('produtos', 'cp'));
			
		}
		
		// falha na validação
		$errors = $validator->errors();
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Update the specified compra in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$compra = Compra::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Compra::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$compra->update($data);

		return Redirect::route('compra_edit');
	}

	/**
	 * Remove the specified compra from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$compra = Compra::find($id);
		$cp = $compra->id;


		DB::table('pedidos')->where('compra_id', '=', $cp)->delete();

		Compra::destroy($cp);

		return Redirect::route('compras');
	}

	public function pdestroy($id)
	{
		$pd = Pedido::find($id);
		$descont = $pd->valor_unit * $pd->quantidade;
		$cp = $pd->compra_id;

		Pedido::destroy($id);

		$compra = Compra::find($cp);
		$compra->valor = $compra->valor - $descont;
		$compra->save();

		return Redirect::route('compra_edit', array($cp));
	}

}
