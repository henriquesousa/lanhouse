<?php

use Validators\FornecedorValidator as FornecedorValidator;

class FornecedoresController extends BaseController {

	public function __construct() {
		
		$this->beforeFilter('csrf', array('on'=>'post'));
		
	}

	/**
	 * Display a listing of fornecedores
	 *
	 * @return Response
	 */


	public function lists()
	{
		$fornecedores = Fornecedor::orderBy('nome', 'ASC')->paginate(15);
		$qtd = count($fornecedores);

		return View::make('fornecedores.list', compact('fornecedores', 'qtd'));
	}

	/**
	 * Show the form for creating a new fornecedores
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('fornecedores.create');
	}

	/**
	 * Store a newly created fornecedores in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = new FornecedorValidator;

		if($this->validarCPF($input['cpf_cnpj']) or $this->validarCNPJ($input['cpf_cnpj']))
		{
			if ($validator->validate($input, 'create')) 
			{
			  	// validação OK
				$fornecedor = new Fornecedor();

						$fornecedor->nome = ucwords(Input::get("nome"));
						$fornecedor->razao = Input::get("razao");
						$fornecedor->cnpj = Input::get("cpf_cnpj");
						$fornecedor->email = Input::get("email");
						$fornecedor->phone = Input::get("phone");
						$fornecedor->endereco = Input::get("endereco");
						$fornecedor->save();

				return Redirect::route("fornecedores");
				
				
			}
		}
		// falha na validação
		$errors = $validator->errors();
		$errors['cpf_cnpj'] = "CPF ou CNPJ Invalido! Favor informar CPF ou CNPJ corretamente";
		return Redirect::back()->withErrors($errors)->withInput();

	}

	/**
	 * Display the specified fornecedor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		if (Request::ajax()) {
			$funci = Fornecedor::find(Input::get('id'));
			return $funci;
		}
	}

	/**
	 * Show the form for editing the specified fornecedor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$fornecedor = Fornecedor::find($id);

		return View::make('fornecedores.edit', compact('fornecedor'));
	}

	/**
	 * Update the specified fornecedor in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::get();
		//dd($input);

		$validator = new FornecedorValidator;

		$fornecedor = Fornecedor::findOrFail($input['id']);

		if($this->validarCPF($input['cpf_cnpj']) or $this->validarCNPJ($input['cpf_cnpj']))
		{

			if ($validator->validate($input, 'update')) {
			  // validação OK
				//$fornecedor = Fornecedor::findOrFail(Input::get('id'));

				$fornecedor->nome = ucwords(Input::get("nome"));
				$fornecedor->razao = Input::get("razao");
				$fornecedor->cnpj = Input::get("cpf_cnpj");
				$fornecedor->email = Input::get("email");
				$fornecedor->phone = Input::get("phone");
				$fornecedor->endereco = Input::get("endereco");
				$fornecedor->update();

				Session::flash('message', 'Fornecedor editado com sucesso!');
				return Redirect::route('fornecedores');
			}

			$errors = $validator->errors();
			return Redirect::back()->withErrors($errors)->withInput();

		}
		// falha na validação
		$errors = $validator->errors();
		$errors['cpf_cnpj'] = "CPF ou CNPJ Invalido! Favor informar CPF ou CNPJ corretamente";
		return Redirect::back()->withErrors($errors)->withInput();
	}

	/**
	 * Remove the specified fornecedor from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$fornecedor = Fornecedor::findOrFail($id);
		$fornecedor->delete();

		return Redirect::route('fornecedores');
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

    function validarCNPJ($cnpj)
	 	{
			//Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
			$j=0;
			for($i=0; $i<(strlen($cnpj)); $i++)
				{
					if(is_numeric($cnpj[$i]))
						{
							$num[$j]=$cnpj[$i];
							$j++;
						}
				}
			//Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
			if(count($num)!=14)
				{
					$validarCNPJ=false;
					return false;
				}
			//Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
			if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 && $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0)
				{
					$validarCNPJ=false;
				}
			//Etapa 4: Calcula e compara o primeiro dígito verificador.
			else
				{
					$j=5;
					for($i=0; $i<4; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$j=9;
					for($i=4; $i<12; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[12])
						{
							$validarCNPJ=false;
						} 
				}
			//Etapa 5: Calcula e compara o segundo dígito verificador.
			if(!isset($validarCNPJ))
				{
					$j=6;
					for($i=0; $i<5; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$j=9;
					for($i=5; $i<13; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[13])
						{
							$validarCNPJ=false;
						}
					else
						{
							$validarCNPJ=true;
						}
				}
			
			//Etapa 6: Retorna o Resultado em um valor booleano.
			return $validarCNPJ;			
		}


}
