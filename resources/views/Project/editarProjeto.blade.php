@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar  Projeto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.project') }}">
                        @csrf
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $projeto->id }}">

                        <div class="form-group row">
                            <label for="nome_projeto" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome_projeto" type="text" class="form-control @error('nome_projeto') inválido @enderror" name="nome_projeto" value= "{{ $projeto->nome_projeto }}" required autocomplete="nome_projeto" autofocus>

                                @error('nome_projeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area_projeto" class="col-md-4 col-form-label text-md-right">{{ __('Área Projeto') }}</label>

                            <div class="col-md-6">
                                <input id="area_projeto" type="text" class="form-control @error('area_projeto') inválido @enderror" name="area_projeto" value= "{{ $projeto->area_projeto }}" required autocomplete="area_projeto" autofocus>

                                @error('area_projeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pontuacao" class="col-md-4 col-form-label text-md-right">{{ __('Pontuação') }}</label>

                            <div class="col-md-6">
                                <input id="pontuacao" type="text" class="form-control @error('pontuacao') inválido @enderror" name="pontuacao" value="{{ $projeto->pontuacao }}" required autocomplete="pontuacao">

                                @error('pontuacao')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                                <div class="btn btn-secondary">
                                    <a href="{{ URL::previous() }}" class="hover:text-white hover:no-underline">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
