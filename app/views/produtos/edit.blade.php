@extends('layouts.dashboard')
@section('head')
  @parent
    <title>cPanel - Produto Editar</title>

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
      "route" => "produto_update",
      "autocomplete" => "off",
      "class" => "form-horizontal"
    ]) }}
    
  			       <input type="hidden" name="id" value="{{ $produto->id }}">
              
                <!-- Form Name -->
                <h3>Editando Produto - {{ $produto->descricao }} </h3>
                <h5>Criado em:<span class="badge">{{ date('d/m/Y', strtotime($produto->created_at)) }}</span></h5>

                <div class="panel panel-primary"><!-- painel-->
                  <div class="panel-heading">
                    <h3 class="panel-title text-center">Dados do Produto</h3>
                  </div>
                  <div class="panel-body">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Descrição">Descrição:</label>  
                      <div class="col-md-5">
                        {{ Form::text('descricao', isset($produto->descricao) ? $produto->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Quantidade">Quantidade:</label>  
                      <div class="col-md-5">
                        {{ Form::text('quantidade', isset($produto->quantidade) ? $produto->quantidade : Input::old('quantidade'), array('class' => 'form-control input-md')) }}
                      </div>
                    </div>

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="Valor">Valor:</label>  
                      <div class="col-md-5">
                        {{ Form::text('valor', isset($produto->valor) ? $produto->valor : Input::old('valor'), array('class' => 'form-control input-md valor')) }}
                      </div>
                    </div>

                    

                    <!-- Text input-->
                    <div class="form-group">
                    	{{ Form::label('Categoria', 'Categoria', array('class' => 'col-md-4 control-label')) }}
                    	<div class="col-md-5">
        							{{ Form::select('categoria', $categorias->lists('descricao', 'id'), isset($despesa->categoria_id) ? $despesa->categoria_id : Input::old('categoria_id'), ['class' => 'form-control input-md']) }}
        						</div>
        					</div>

                    <!-- Text input-->
                    <div class="form-group">
                      {{ Form::label('Fornecedor', 'Fornecedor', array('class' => 'col-md-4 control-label')) }}
                      <div class="col-md-5">
                      {{ Form::select('fornecedor', $fornecedores->lists('nome', 'id'), isset($despesa->fornecedor_id) ? $despesa->fornecedor_id : Input::old('fornecedor_id'), ['class' => 'form-control input-md']) }}
                    </div>
                  </div>



                </div>
              </div><!-- / painel-->

                
                <!-- Button (Double) -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="cadastrar"></label>
                  <div class="col-md-8">
                    <input type="submit" value="Editar" class="btn btn-sm btn-primary" />
                    {{ HTML::linkRoute('funcionarios', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
                  </div>
                </div>


               

              
        {{ Form::close() }}
  </div>
@stop

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('.phone').mask('(00) 0000-0000');
    $('.valor').mask('0000,00', {reverse: true});
  });
</script>
@stop
		