@extends('layouts.dashboard')
  @section('head')
      @parent
      <title>cPanel - Compras Adicionar</title>
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
        "route" => "compra_store",
        "autocomplete" => "off",
        "class" => "form-horizontal"
      ]) }}

      
        <!-- Form Name -->
        <h3>Adicionar compra </h3>

        <div class="panel panel-primary"><!-- painel-->
          <div class="panel-heading">
            <h3 class="panel-title text-center">Produtos</h3>
          </div>
          <div class="panel-body">

            
            <div class="form-group">
              <label class="col-md-4 control-label" for="produto">Produto:</label>
              <div class="input-group col-md-5">

                <select name="produto" class="form-control">
                <option >Selecione...</option>
                @foreach ($produtos as $produto)
                  <option value="{{ $produto->id }}">{{ $produto->descricao }}</option>
                @endforeach
                </select>

                <div class="input-group-btn">
                      <a class="btn btn-sm btn-success pull-right" href="{{ URL::route('produto_add') }}"><i class="glyphicon glyphicon-plus"></i></a>
                      </div>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Valor Unitario">Valor Unitário:</label>
              <div class="col-md-5">
                {{ Form::text('valor_unit', Input::old('valor_unit'), array('class' => 'form-control input-md valor')) }}
              </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="Quantidade">Quantidade:</label>  
              <div class="col-md-5">
                {{ Form::text('quantidade', Input::old('quantidade'), array('class' => 'form-control input-md')) }}
              </div>
            </div>


            <input type="hidden" name="cp" value="{{ isset($cp) ? $cp : '' }}">             
                


          </div>
        </div><!-- /painel -->


        <!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cadastrar"></label>
          <div class="col-md-8">
            <input type="submit" value="Adicionar" class="btn btn-sm btn-primary" />
            {{ HTML::linkRoute('compras', 'Finalizar', array(), array('class' => 'btn btn-sm btn-danger')) }}
          </div>
        </div>




       {{ Form::close() }}
    </div><!-- /table -->

    <div class="table">

    


@stop

@section('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    $('.phone').mask('(00) 0000-0000');
    $('.valor').mask('0000,00', {reverse: true});
  });
</script>
@stop