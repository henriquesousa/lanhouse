<?php

class PedidosController extends \BaseController {

	/**
	 * Display a listing of pedidos
	 *
	 * @return Response
	 */
	public function index()
	{
		$pedidos = Pedido::all();

		return View::make('pedidos.index', compact('pedidos'));
	}

	/**
	 * Show the form for creating a new pedido
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pedidos.create');
	}

	/**
	 * Store a newly created pedido in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Pedido::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Pedido::create($data);

		return Redirect::route('pedidos.index');
	}

	/**
	 * Display the specified pedido.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pedido = Pedido::findOrFail($id);

		return View::make('pedidos.show', compact('pedido'));
	}

	/**
	 * Show the form for editing the specified pedido.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pedido = Pedido::find($id);

		return View::make('pedidos.edit', compact('pedido'));
	}

	/**
	 * Update the specified pedido in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pedido = Pedido::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Pedido::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$pedido->update($data);

		return Redirect::route('pedidos.index');
	}

	/**
	 * Remove the specified pedido from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Pedido::destroy($id);

		return Redirect::route('pedidos.index');
	}

}
