 @extends('layouts.dashboard')

 @section('head')
      @parent
      <title>cPanel - Funcionarios</title>
      <style type="text/css">
			.filterable {
			    margin-top: 15px;
			}
			.filterable .panel-heading .pull-right {
			    margin-top: -20px;
			}
			.filterable .filters input[disabled] {
			    background-color: transparent;
			    border: none;
			    cursor: auto;
			    box-shadow: none;
			    padding: 0;
			    height: auto;
			}
			.filterable .filters input[disabled]::-webkit-input-placeholder {
			    color: #333;
			}
			.filterable .filters input[disabled]::-moz-placeholder {
			    color: #333;
			}
			.filterable .filters input[disabled]:-ms-input-placeholder {
			    color: #333;
			}
		</style>
  @stop
 @section('conteudo')

    <div class="container col-md-12">
	    <h3>Lista de Funcionários </h3>
	    <hr>
	    <div class="row">
	        <div class="panel panel-primary filterable">
	            <div class="panel-heading">
	                <h3 class="panel-title">Users</h3>
	                <div class="pull-right">
	                    <button class="btn btn-default btn-xs btn-filter "><span class="glyphicon glyphicon-filter"></span> Filter</button>
	                </div>
	            </div>
	            <table class="table" id="mytable" >
	                <thead>
	                    <tr class="filters">
	                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="E-mail" disabled></th>
	                        <th><input type="text" class="form-control" placeholder="Telefone" disabled></th>
	                        <th colspan="2">Ações</th>
	                    </tr>
	                </thead>
	                <tbody>
	                		@if(!Auth::check())
	                		@foreach($funcionarios as $funcionario)

								

								<tr>
								<td>{{ $funcionario->id }}</td>
								<td>{{ $funcionario->nome }}</td>
								<td>{{ isset($funcionario->email) ? $funcionario->email : '' }}</td>
								<td>{{ $funcionario->phone }}</td>
								
								@if(!Auth::check())
									<td><button id="{{ $funcionario->id }}" class="btn btn-primary btn-xs findFuncionario" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></td>
	                        		<td><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></td>
										
								@endif
								
							</tr>
							
							@endforeach
							@endif

	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>


@stop

@section('modal')
<div class="modal fade EditModal" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		        <h4 class="modal-title custom_align" id="Heading">Editar Registro</h4>
      		</div>
	        <div class="modal-body">
	        	<div class="form-group">
        			<input class="form-control " type="text" placeholder="Mohsin" value="{{ $funcionario->nome }}">
        		</div>
        		<div class="form-group">
        			<input class="form-control " type="text" placeholder="Irshad">
        		</div>
        		<div class="form-group">
        			<textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    			</div>
    			<div class="form-group">
    				{{ Form::select('civil', ['1' => 'Casado(a)', '2' => 'Viuvo(a)', '3' => 'Solteiro(a)'], 2, ['class' => 'form-control']) }}
    			</div>
    		</div>
          	<div class="modal-footer" >
        		<button type="button" class="btn btn-warning btn-lg postEdit" style="width: 100%;">
        			<span class="glyphicon glyphicon-ok-sign"></span> Editar
        		</button>
      		</div>
      		<div class="ajaxDiv"></div>
        </div>
        
	<!-- /.modal-content --> 
	</div>
<!-- /.modal-dialog --> 
</div>
    
    
    
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
 		<div class="modal-content">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        		<h4 class="modal-title custom_align" id="Heading">Deletar registro</h4>
      		</div>
	        <div class="modal-body">
	       
		    	<div class="alert alert-warning">
		    		<span class="glyphicon glyphicon-warning-sign"></span> Tem certeza de que deseja excluir este registro?
		    	</div>
	    	</div>
		    <div class="modal-footer ">
		        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-ok-sign"></span> Sim</button>
		        <button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span> Não</button>
		    </div>
 		</div>
    <!-- /.modal-content --> 
	</div>
<!-- /.modal-dialog -->
</div>
@stop









@section('scripts')

<script type="text/javascript">
			/*
			Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
			*/
			$(document).ready(function(){

				$("#mytable #checkall").click(function () {
					if ($("#mytable #checkall").is(':checked')) {
						$("#mytable input[type=checkbox]").each(function () {
							$(this).prop("checked", true);
						});
					} else {
						$("#mytable input[type=checkbox]").each(function () {
							$(this).prop("checked", false);
						});
					}
				});

				

				 $('.findFuncionario').on('click',function(e){
				 	var id = $(this).attr('id');
				 	
					    e.preventDefault();
					        $.ajax({
					            type: 'GET',
					            cache: false,
					            dataType: 'JSON',
					            url: "{{ URL::to('/admin/funcionariofind/id') }}",
					            data: id,
					            success: function(data) {

					                if(data.error == true) {
					                   $('.ajaxDiv').append('error message');
					                } else {
					                   $('.ajaxDiv').text('$'+data);
					                }
					            },

					        });
					        //	return false;
					});
			        
			  




			    $('.filterable .btn-filter').click(function(){
			    	var $panel = $(this).parents('.filterable'),
			        $filters = $panel.find('.filters input'),
			        $tbody = $panel.find('.table tbody');
			        if ($filters.prop('disabled') == true) {
			            $filters.prop('disabled', false);
			            $filters.first().focus();
			        } else {
			            $filters.val('').prop('disabled', true);
			            $tbody.find('.no-result').remove();
			            $tbody.find('tr').show();
			        }
			    });

			    $('.filterable .filters input').keyup(function(e){
			        /* Ignore tab key */
			        var code = e.keyCode || e.which;
			        if (code == '9') return;
			        /* Useful DOM data and selectors */
			        var $input = $(this),
			        inputContent = $input.val().toLowerCase(),
			        $panel = $input.parents('.filterable'),
			        column = $panel.find('.filters th').index($input.parents('th')),
			        $table = $panel.find('.table'),
			        $rows = $table.find('tbody tr');
			        /* Dirtiest filter function ever ;) */
			        var $filteredRows = $rows.filter(function(){
			            var value = $(this).find('td').eq(column).text().toLowerCase();
			            return value.indexOf(inputContent) === -1;
			        });
			        /* Clean previous no-result if exist */
			        $table.find('tbody .no-result').remove();
			        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
			        $rows.show();
			        $filteredRows.hide();
			        /* Prepend no-result row if all rows are filtered */
			        if ($filteredRows.length === $rows.length) {
			            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
			        }
			    });


			});

		</script>
@stop