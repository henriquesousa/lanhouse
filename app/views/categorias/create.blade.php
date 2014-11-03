@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel - Categorias Adicionar</title>
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
        "route" => "categoria_store",
        "autocomplete" => "off",
        "class" => "form-horizontal"
      ]) }}

        <!-- Form Name -->
        <h3>Adicionar Categoria </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Categorias</h3>
          </div>
          <div class="panel-body">

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Descrição">Descrição: </label>
              <div class="col-md-5">
                {{ Form::text('descricao', isset($categoria->descricao) ? $ategoria->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
              </div>
            </div>
            
          </div>
        </div><!-- /painel -->

        


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-primary" />
            {{ HTML::linkRoute('categorias', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

@stop