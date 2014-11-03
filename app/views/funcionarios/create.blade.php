@extends('layouts.cadastroLayout')
  
  	@section('head')
  		@parent
  		<title>Cadastro Funcionario</title>

	    <link rel="stylesheet" href="{{ asset('css/cadastroStyle.css') }}" />
	    <style type="text/css">
	    #wrap > .container {
		  padding: 60px 15px 0;
		}
		/* Wrapper for page content to push down footer */
		#wrap {
		  min-height: 100%;
		  height: auto !important;
		  height: 100%;
		  /* Negative indent footer by its height */
		  margin: 0 auto -60px;
		  /* Pad bottom by footer height */
		  padding: 0 0 60px;
		}

		/* Set the fixed height of the footer here */
		#footer {
		  height: 60px;
		  background-color: #f5f5f5;
		}

		
		#wrap > .container {
		  padding: 60px 15px 0;
		}
		.container .credit {
		  margin: 20px 0;
		}

		#footer > .container {
		  padding-left: 15px;
		  padding-right: 15px;
		}
		</style>
    @stop


    @section('conteudo')
    	@if (isset($errors))
			@foreach($errors->all() as $error)
				<div class="alert alert-danger" role="alert">
					{{ $error }}
				</div>
			@endforeach
		@endif
    		<div class="stepwizard">
			    <div class="stepwizard-row setup-panel">
			        <div class="stepwizard-step">
			            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
			            <p> Dados Pessoais</p>
			        </div>
			        <div class="stepwizard-step">
			            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
			            <p> Contato </p>
			        </div>
			        <div class="stepwizard-step">
			            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
			            <p> Empresa </p>
			        </div>
			    </div>
			</div>
			{{ Form::open(array('route' => 'funcionario_store')) }}
			    <div class="row setup-content" id="step-1">
			        <div class="col-xs-12">
			            <div class="col-md-12">
			                <h3> Dados Pessoais </h3>
			                <div class="form-group">
			                    <label class="control-label">Nome</label>
			                    <input  maxlength="100" type="text" name="nome" required="required" class="form-control" placeholder="João Paulo"  />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Sobrenome</label>
			                    <input maxlength="100" type="text" name="sobrenome" required="required" class="form-control" placeholder="Moraes Neto " />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">RG</label>
			                    <input maxlength="100" type="text" name="rg" required="required" class="form-control" placeholder="Entre com letras e números se existir" />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">CPF</label>
			                    <input maxlength="100" type="text" name="cpf" required="required" class="form-control cpf" />
			                </div>
			                <!-- Multiple Radios (inline) -->
		                    <div class="form-group">
		                      <label class="control-label" for="genero">Sexo :</label>
		                      <div class="form-control"> 		   
		                          <label class="radio-inline" for="feminino">
		                            <input type="radio" name="sexo" value="Feminino" />
		                            Feminino
		                          </label>
		                          <label class="radio-inline" for="masculino">
		                            <input type="radio" name="sexo" value="Masculino" />
		                            Masculino
		                          </label>
		                          
		                      </div>
		                    </div>


		                    <div class="form-group">
		                        <label for="status" class="control-label">Estado Civil</label>
		                        
			                        <select class="form-control" name="civil">
									  <option value="">Selecione</option>
									  <option value="1">Solteiro</option>
				                      <option value="2">Casado</option>
				                      <option value="3">Viúvo</option>  
									</select>
			                	
			                </div>
			                
			                <div class="pull-right" >
				                {{ HTML::linkRoute('funcionarios', 'Cancelar', array(), array('class' => 'btn btn-md btn-danger')) }}
				               	<button class="btn btn-primary nextBtn btn-md" type="button" >Next</button>
			               	</div>

			            </div>
			             
			        </div>
			    </div>
			    <div class="row setup-content" id="step-2">
			        <div class="col-xs-12">
			            <div class="col-md-12">
			                <h3> Step 2</h3>
			                <div class="form-group">
			                    <label class="control-label">Email</label>
			                    <input maxlength="200" type="email" name="email" required="required" class="form-control" placeholder="email@hmail.com" />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Telefone</label>
			                    <input maxlength="200" type="text" name="phone" required="required" class="form-control phone" placeholder="Enter Company Address"  />
			                </div>

			                <div class="pull-right" >
				                {{ HTML::linkRoute('funcionarios', 'Cancelar', array(), array('class' => 'btn btn-md btn-danger')) }}
				               	<button class="btn btn-primary nextBtn btn-md" type="button" >Next</button>
			               	</div>

			            </div>
			        </div>
			    </div>
			    <div class="row setup-content" id="step-3">
			        <div class="col-xs-12">
			            <div class="col-md-12">
			                <h3> Step 3</h3>
			                <div class="form-group">
			                    <label class="control-label">Codigo de Cadastro</label>
			                    <input maxlength="100" type="text" name="codigo" required="required" class="form-control" placeholder="Só para funcionários" />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Usuário</label>
			                    <input maxlength="200" type="text" name="username" required="required" class="form-control" placeholder="Nome de Usuário para acesso" />
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Senha</label>
			                    <input maxlength="200" type="password" name="password" required="required" class="form-control" placeholder="Numero e Letras são indicados"  />
			                </div>
			            </div>

			            	<div class="pull-right" >
				                {{ HTML::linkRoute('funcionarios', 'Cancelar', array(), array('class' => 'btn btn-md btn-danger')) }}
				               	<button class="btn btn-primary nextBtn btn-md" type="button" >Next</button>
			               	</div>

			            </div>
			        </div>
			    </div>
			{{ Form::close() }}
		<br/>
	@stop

	@section('scripts')
		@parent
		<script src="{{ asset('js/cadastroScript.js') }}"></script>
		<script src="{{ asset('js/formMasc.js') }}"></script>
	@stop

