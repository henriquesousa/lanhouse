@extends('layouts.dashboard')
@section('head')
  @parent
    <title>cPanel - Categoria Editar</title>

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
      "route" => "categoria_update",
      "autocomplete" => "off",
      "class" => "form-horizontal"
    ]) }}
    
  			       <input type="hidden" name="id" value="{{ $categoria->id }}">
              
                <!-- Form Name -->
                <h3>Editando categoria - {{ $categoria->descricao }} </h3>
                <h5>Criado em:<span class="badge">{{ date('d/m/Y', strtotime($categoria->created_at)) }}</span></h5>

                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados Cadastrais</h3>
                  </div>
                  <div class="panel-body">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Descricao">Descrição:</label>  
                      <div class="col-md-5">
                        {{ Form::text('descricao', isset($categoria->descricao) ? $categoria->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
                      </div>
                    </div>

                    

                </div>
              </div><!-- / painel-->


                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="cadastrar"></label>
                  <div class="col-md-8">
                    <input type="submit" value="Edit" class="btn btn-primary" />
                    {{ HTML::linkRoute('categorias', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
                  </div>
                </div>


               

              
        {{ Form::close() }}
  </div>
@stop



		