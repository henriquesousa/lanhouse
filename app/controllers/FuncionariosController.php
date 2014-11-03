<?php

use Validators\FuncionarioValidator as FuncionarioValidator;

class FuncionariosController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of funcionarios
	 *
	 * @return Response
	 */


	public function lists()
	{
		$funcionarios = Funcionario::orderBy('nome', 'ASC')->paginate(15);
		$qtd = count($funcionarios);

		return View::make('funcionarios.list', compact('funcionarios', 'qtd'));
	}

	/**
	 * Show the form for creating a new funcionario
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('funcionarios.create');
	}

	/**
	 * Store a newly created funcionario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new FuncionarioValidator;

		if($this->validarCPF($input['cpf']))
		{
			if (Input::get('codigo') == 'wiver2014' and $validator->validate($input, 'create')) {
			  	// validação OK
				$funcionario = new Funcionario();

						$funcionario->nome = ucwords(Input::get("nome")." ".Input::get("sobrenome"));
						$funcionario->rg = Input::get("rg");
						$funcionario->cpf = Input::get("cpf");
						$funcionario->sexo = Input::get("sexo");
						$funcionario->civil = Input::get("civil");
						$funcionario->email = Input::get("email");
						$funcionario->phone = Input::get("phone");
						$funcionario->username = Input::get("username");
						$funcionario->password = Hash::make(Input::get("password"));
						$funcionario->save();


						$credentials = [
						"username" => Input::get("username"),
						"password" => Input::get("password")
						];

				if (Auth::attempt($credentials))
				{
				return Redirect::route("funcionarios");
				}
				
			}
		}
		// falha na validação
		$errors = $validator->errors();
		$errors['cpf'] = "CPF Invalido! Favor informar CPF corretamente";
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified funcionario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		if (Request::ajax()) {
			$funci = Funcionario::find(Input::get('id'));
			return $funci;
		}
	}

	/**
	 * Show the form for editing the specified funcionario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$funcionario = Funcionario::find($id);

		return View::make('funcionarios.edit', compact('funcionario'));
	}

	/**
	 * Update the specified funcionario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::get();
		//dd($input);

		$validator = new FuncionarioValidator;

		$funcionario = Funcionario::findOrFail($input['id']);

		if($this->validarCPF($input['cpf']))
		{

			if ($validator->validate($input, 'update')) {
			  // validação OK
				//$funcionario = Funcionario::findOrFail(Input::get('id'));

						$funcionario->nome = ucwords(Input::get("nome"));
						$funcionario->rg = Input::get("rg");
						$funcionario->cpf = Input::get("cpf");
						$funcionario->sexo = Input::get("sexo");
						$funcionario->civil = Input::get("civil");
						$funcionario->email = Input::get("email");
						$funcionario->phone = Input::get("phone");
						$funcionario->username = Input::get("username");
						$funcionario->password = Hash::make(Input::get("password"));
						$funcionario->update();


			return Redirect::route('funcionarios');
			}

		}
		// falha na validação
		$errors = $validator->errors();
		$errors['cpf'] = "CPF Invalido! Favor informar CPF corretamente";
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
		$funcionario = Funcionario::findOrFail($id);
		$funcionario->delete();

		return Redirect::route('funcionarios');
	}

	function validarCPF($cpf){
      $cpf = str_pad(str_replace(array('.','-','/'),'',$cpf),11,'0',STR_PAD_LEFT);
      $invalidos = array('00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999');  

      if(strlen($cpf) != 11 || in_array($cpf,$invalidos)){
        return false;
      }else{   // Calcula os números para verificar se o CPF é verdadeiro
        for($t = 9; $t < 11; $t++){
          for($d = 0, $c = 0; $c < $t; $c++){
            $d += $cpf{$c} * (($t + 1) - $c);
          }
          $d = ((10 * $d) % 11) % 10;
          if($cpf{$c} != $d){
            return false;
          }
        }
        return true;
      }
    }


}
