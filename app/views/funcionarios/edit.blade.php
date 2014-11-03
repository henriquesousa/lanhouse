@extends('layouts.dashboard')
@section('head')
  @parent
    <title>cPanel - Funcionario Editar</title>

  @stop
@section('conteudo')

    @if (isset($errors))
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

  	<div class="table">

  	{{ Form::open([
      "route" => "funcionario_update",
      "autocomplete" => "off",
      "class" => "form-horizontal"
    ]) }}
    
  			       <input type="hidden" name="id" value="{{ $funcionario->id }}">
              
                <!-- Form Name -->
                <h3>Editando Funcionario - {{ $funcionario->nome }} </h3>
                <h5>Criado em:<span class="badge">{{ date('d/m/Y', strtotime($funcionario->created_at)) }}</span></h5>

                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados Pessoais</h3>
                  </div>
                  <div class="panel-body">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Nome">Nome e Sobrenome:</label>  
                      <div class="col-md-5">
                        {{ Form::text('nome', isset($funcionario->nome) ? $funcionario->nome : Input::old('nome'), array('class' => 'form-control input-md')) }}
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="RG">Número Identidade:</label>  
                      <div class="col-md-5">
                        {{ Form::text('rg', isset($funcionario->rg) ? $funcionario->rg : Input::old('rg'), array('class' => 'form-control input-md')) }}
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="CPF">Número CPF:</label>  
                      <div class="col-md-5">
                        {{ Form::text('cpf', isset($funcionario->cpf) ? $funcionario->cpf : Input::old('cpf'), array('class' => 'form-control input-md cpf')) }}
                      </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="genero">Sexo :</label>
                      <div class="col-md-4"> 
                        @if( isset($funcionario->sexo) ? $funcionario->sexo : Input::old('sexo') and $funcionario->sexo == "Masculino")
      	                  <label class="radio-inline" for="masculino">
      	                    <input type="radio" name="sexo" value="Masculino" checked="checked" />
      	                    Masculino
      	                  </label>
      	                  <label class="radio-inline" for="feminino">
      	                    <input type="radio" name="sexo" value="Feminino" />
      	                    Feminino
      	                  </label>
                        @else
                        	<label class="radio-inline" for="feminino">
                            <input type="radio" name="sexo" value="Feminino" checked="checked" />
                            Feminino
                          </label>
                          <label class="radio-inline" for="masculino">
                            <input type="radio" name="sexo" value="Masculino" />
                            Masculino
                          </label>
                          
                        @endif
                      </div>
                    </div>

                     <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="civil">Estado Civil :</label>
                      <div class="col-md-1">
                        <select id="civil" name="civil" class="input-xlarge">
                          <option selected value="{{ $funcionario->civil }}" >{{ $funcionario->civil }}</option>
                          <option value="Solteiro">Solteiro</option>
                          <option value="Casado">Casado</option>
                          <option value="Viuvo">Viúvo</option>                    
                        </select>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Telefoe">Número Telefone:</label>  
                      <div class="col-md-5">
                        {{ Form::text('phone', isset($funcionario->phone) ? $funcionario->phone : Input::old('phone'), array('class' => 'form-control input-md phone')) }}
                      </div>
                    </div>

                </div>
              </div><!-- / painel-->

                


                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados de Acesso</h3>
                  </div>
                  <div class="panel-body">
                    
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">E-mail:</label>  
                    <div class="col-md-5">
                      {{ Form::text('email', isset($funcionario->email) ? $funcionario->email : Input::old('email'), array('class' => 'form-control input-md')) }}
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="Usuario">Nome de Usuário:</label>  
                    <div class="col-md-5">
                      {{ Form::text('username', isset($funcionario->username) ? $funcionario->username : Input::old('username'), array('class' => 'form-control input-md')) }}
                    </div>
                  </div>

                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="Usuario">Senha:</label>  
                    <div class="col-md-5">
                      <input type="text" class="form-control input-md" placeholder="@@@@@@@@@@@@@" disabled="" />
                    </div>
                  </div>

                </div>
              </div><!-- / painel-->

                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="cadastrar"></label>
                  <div class="col-md-8">
                    <input type="submit" value="Edit" class="btn btn-primary" />
                    {{ HTML::linkRoute('funcionarios', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
                  </div>
                </div>


               

              
        {{ Form::close() }}
  </div>
@stop

@section('scripts')

  <script type="text/javascript">
      /*
      Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
      */
      $(document).ready(function(){
        //mascara para exibição jquery
          $('.phone').mask('(00) 0000-0000');
          $('.cpf').mask('000.000.000-00');
      });
  </script>
@stop


		