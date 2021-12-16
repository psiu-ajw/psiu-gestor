@extends('layouts.app')
@section('titulo','Lista de Projetos Cadastrados')
@section('content')
@include('popper::assets')
    
    <div class="shadow p-4 bg-white rounded container-fluid col-md-8" style="overflow-x: auto;">
		<h1 class="text-center">Projetos Cadastrados</h1>
		<h2 class="text-center">
		</h2><br>
		@if($projetos != null)
			<table id="tabela_dados" class="table table-hover">
		 		<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>Bairro / Comunidade</th>
						<th>Pontuação</th>
						<th>Financiador</th>
						<th style="width: 15%">Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach($projetos as $projeto)
					
						<tr>
							<td>{{$projeto->id}}</td>
							<td>
								<a href={{ url('projeto', ['show', $projeto->id])}}>
									{{$projeto->nome_projeto}}
								</a>
							</td>
							<td>{{$projeto->comunidade->name}}</td>
							<td>{{$projeto->pontuacao}}</td>
							<td>{{$projeto->financiador}}</td> 
							<td>
								<a @popper(Editar Projeto) href="{{ route('edit.project', ['id' => $projeto->id]) }}" class="btn btn-primary">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
										<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
										<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
									</svg>
								</a>
								<a @popper(Excluir Projeto) onclick="return confirm('Você tem certeza que deseja excluir o projeto: {{$projeto->nome_projeto}}?')" href="{{ route('delete.project', ['id' => $projeto->id]) }}" class="btn btn-danger">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
									</svg>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p class="text-center alert alert-light">Não existem projeto cadastrados até o momento.</p>
		@endif
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