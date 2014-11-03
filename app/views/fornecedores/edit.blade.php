@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel - Fornecedores Editar </title>
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
        "route" => "fornecedor_update",
        "autocomplete" => "off",
        "class" => "form-horizontal"
      ]) }}
        
        <input type="hidden" name="id" value="{{ $fornecedor->id }}">
        
        <!-- Form Name -->
        <h3>Editando Fornecedor - {{ $fornecedor->nome }}</h3>
        <h5>Criado em:<span class="badge">{{ date('d/m/Y', strtotime($fornecedor->created_at)) }}</span></h5>

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
                {{ Form::text('cpf_cnpj', isset($fornecedor->cnpj) ? $fornecedor->cnpj : Input::old('cpf_cnpj'), array('class' => 'form-control input-md cpf')) }}
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
            <input type="submit" value="Editar" class="btn btn-primary" />
            {{ HTML::linkRoute('fornecedores', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

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