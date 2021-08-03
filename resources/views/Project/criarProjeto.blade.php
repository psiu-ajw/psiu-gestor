@extends('layouts.app')
@section('titulo','Cadastrar Projeto')
@section('content')
	
	<form class="shadow p-3 bg-white rounded" action= "{{route('create.project')}}" method="post">
		<h1 class="text-center"> Cadastrar Projeto </h1><br>
			@csrf
		<div class="form-row col-md-12 justify-content-center">
			<div class="form-group col-md-4">
				<label for="nome_projeto">Nome do Projeto</label>
				<input type="text" class="form-control{{ $errors->has('nome_projeto') ? ' is-invalid' : '' }}"  name="nome_projeto" id="nome_projeto" placeholder="Digite o nome do projetp" value="{{ old('nome_projeto') }}" required autofocus>
				@if ($errors->has('nome_projeto'))
					<span class = "invalid-feedback" role="alert">
						<strong>{{$errors->first('nome_projeto')}}
					</span>
				@endif
			</div> 

            <div class="form-group col-md-4">
				<label for="area_projeto">Área do Projeto</label>
				<input type="text" class="form-control{{ $errors->has('area_projeto') ? ' is-invalid' : '' }}"  name="area_projeto" id="area_projeto" placeholder="Digite a Area do Projeto" value="{{ old('area_projeto') }}" required autofocus>
				@if ($errors->has('area_projeto'))
					<span class = "invalid-feedback" role="alert">
						<strong>{{$errors->first('area_projeto')}}
					</span>
				@endif
			</div>
		
			<div class="form-group col-md-4">
				<label for="item_id">Itens</label>
				<select class="form-control{{ $errors->has('item_id') ? ' is-invalid' : '' }}" name="item_id" required autofocus>
					<option hidden disabled selected>Selecione o itens</option>
					@foreach ($itens as $item)
						<option value="{{$item->id}}" {{ old('item') == $item->id ? 'selected' : ''}}   >{{$item->nome_projeto}}</option>
					@endforeach
				</select>
				@if ($errors->has('item_id'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('item_id')}}
					</span>
				@endif
			</div>

            <div class="form-group col-md-4">
				<label for="financiador">Financiador</label>
				<select class="form-control{{ $errors->has('financiador') ? ' is-invalid' : '' }}" name="financiador" required autofocus>
					<option hidden disabled selected>Selecione o itens</option>
					@foreach ($financiadores as $financiador)
						<option value="{{$financiador}}" @if (old('financiador') == $financiador) selected @endif>{{$financiador}}</option>
					@endforeach
				</select>
				@if ($errors->has('financiador'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('financiador')}}
					</span>
				@endif
			</div>
		</div>

		<div class="col-md-12 text-center">
			<br><button type="submit" class="btn btn-primary">Cadastrar</button><br><br>
		</div>
	</form>
@stop