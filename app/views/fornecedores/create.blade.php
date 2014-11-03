@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel - Fornecedores Adicionar</title>
  @stop
 @section('conteudo')

    <!-- Exibir erros -->
    @if (isset($errors))
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif

    <div class="table">
      {{ Form::open([
        "route" => "fornecedor_store",
        "autocomplete" => "off",
        "class" => "form-horizontal"
      ]) }}

        <!-- Form Name -->
        <h3>Adicionar Fornecedor </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Cadastrais Gerais</h3>
          </div>
          <div class="panel-body">

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Nome">Nome</label>
              <div class="col-md-5">
                {{ Form::text('nome', isset($fornecedor->nome) ? $fornecedor->nome : Input::old('nome'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Nome">Razão Social</label>
              <div class="col-md-5">
                {{ Form::text('razao', isset($fornecedor->razao) ? $fornecedor->razao : Input::old('razao'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="CPF_CNPJ">Número CPF ou CNPJ:</label>  
              <div class="col-md-5">
                {{ Form::text('cpf_cnpj', isset($fornecedor->cnpj) ? $fornecedor->cnpj : Input::old('cpf_cnpj'), array('class' => 'form-control input-md')) }}
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Email">E-mail:</label>  
              <div class="col-md-5">
                {{ Form::text('email', isset($fornecedor->email) ? $fornecedor->email : Input::old('email'), array('class' => 'form-control input-md')) }}
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Telefoe">Número Telefone:</label>  
              <div class="col-md-5">
                {{ Form::text('phone', isset($fornecedor->phone) ? $fornecedor->phone : Input::old('phone'), array('class' => 'form-control input-md phone')) }}
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Nome">Endereço:</label>
              <div class="col-md-5">
                {{ Form::text('endereco', isset($fornecedor->endereco) ? $fornecedor->endereco : Input::old('endereco'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


          </div>
        </div><!-- /painel -->


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-primary btn-sm" />
            {{ HTML::linkRoute('fornecedores', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

@stop