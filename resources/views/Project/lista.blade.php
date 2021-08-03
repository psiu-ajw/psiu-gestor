@extends('layouts.app')
@section('titulo','Lista de Projetos Cadastrados')
@section('content')
    
    <div class="shadow p-4 bg-white rounded container-fluid" style="overflow-x: auto;">
		<h1 class="text-center">Projetos Cadastrados</h1>
		<h2 class="text-center">
		</h2><br>
		@if($projetos != null)
			<table id="tabela_dados" class="table table-hover">
		 		<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Area</th>
						<th>Pontuação</th>
						<th>Financiador</th>
						<th style="width: 15%">Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projetos as $projeto)
					
						<tr>
							<td>{{$projeto->id}}</td>
							<td>{{$projeto->nome_projeto}}</td>
							<td>{{$projeto->area_projeto}}</td>
							<td>{{$projeto->pontuacao}}</td>
							<td>{{$projeto->financiador}}</td> 
							<td>
								<a href="{{ route('edit.project', ['id' => $projeto->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
								<a onclick="return confirm('Você tem certeza que deseja excluir?')" href="{{ route('delete.project', ['id' => $projeto->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center alert alert-light">Não existem projeto cadastrados até o momento.</p>
		@endif
		
		<div class="col-md-12 text-center">
			<br><a class="btn btn-primary" href="{{route('new.project')}}"> Inserir novo </a><br>
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#tabela_dados').DataTable({
				"columnDefs": [
					{ "orderable": false, "targets": 3 }
				],
				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
				}
			});
		} );
	</script>

@stop