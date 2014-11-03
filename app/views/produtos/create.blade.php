@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel - Produtos Adicionar</title>
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
        "route" => "produto_store",
        "autocomplete" => "off",
        "class" => "form-horizontal"
      ]) }}

        <!-- Form Name -->
        <h3>Adicionar Produto </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Dados Cadastrais</h3>
          </div>
          <div class="panel-body">

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Descrição">Descrição: </label>
              <div class="col-md-5">
                {{ Form::text('descricao', isset($produto->descricao) ? $produto->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Quantidade">Quantidade: </label>
              <div class="col-md-5">
                {{ Form::text('quantidade', isset($produto->quantidade) ? $produto->quantidade : Input::old('quantidade'), array('class' => 'form-control input-md')) }}
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="valor">Valor Unitario:: </label>
              <div class="col-md-5">
                {{ Form::text('valor', isset($produto->valor) ? $produto->valor : Input::old('valor'), array('class' => 'form-control input-md valor')) }}
              </div>
            </div>


            <!-- Select Basic -->
             <div class="form-group">
            	<label class="col-md-4 control-label" for="categoria">Categoria :</label>
                <div class="col-md-5">
                  <select id="categoria" name="categoria" class="form-control">
                    <option value=" ">...</option>
                    @foreach($categorias as $categoria)
                      <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            <!-- Select Basic -->
             <div class="form-group">
            	<label class="col-md-4 control-label" for="fornecedor">Fornecedor :</label>
                <div class="col-md-5">
                  <select id="fornecedor" name="fornecedor" class="form-control">
                    <option value=" ">...</option>
                    @foreach($fornecedores as $fornecedor)
                      <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


            


          </div>
        </div><!-- /painel -->

        


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-sm btn-primary" />
            {{ HTML::linkRoute('produtos', 'Cancelar', array(), array('class' => 'btn btn-sm btn-danger')) }}
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

@stop

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('.phone').mask('(00) 0000-0000');
    $('.valor').mask('0000,00', {reverse: true});
  });
</script>
@stop