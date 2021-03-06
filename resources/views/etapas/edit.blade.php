@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Informes') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('etapa.update') }}">
                            @csrf
                            <input id="id" type="hidden" class="form-control" name="id" value="{{ $etapa->id }}">
                            <div class="form-group row">
                                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>
                                <div class="col-md-6">
                                    <input placeholder="Insira o título desta etapa do andamento do projeto" id="titulo" type="text" class="form-control @error('titulo') inválido @enderror" name="titulo" value="{{ $etapa['titulo'] }}" required autocomplete="titulo">
                                    @error('titulo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                                <div class="col-md-6">
                                    <input placeholder='Insira a descricao desta etapa do andamento do projeto' id="descricao" type="text" class="form-control @error('descricao') inválido @enderror" name="descricao" value="{{ $etapa['descricao'] }}" required autocomplete="descricao">
                                    @error('descricao')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="andamento" class="col-md-4 col-form-label text-md-right">{{ __('Andamento') }}</label>
                                <div class="col-md-6">
                                    <input type="range" min="0" max="100" id="andamento" type="text" class="form-control @error('andamento') inválido @enderror" name="andamento" value="{{ $etapa['andamento'] }}" required autocomplete="andamento" oninput="this.nextElementSibling.value = this.value">
                                    <output>{{ $etapa['andamento'] }}</output> %
                                    @error('andamento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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