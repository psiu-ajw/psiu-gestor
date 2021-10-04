@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Item de Projeto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.item') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="item_nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome:') }}</label>

                            <div class="col-md-6">
                                <input id="item_nome" type="text" class="form-control @error('item_nome') inválido @enderror" name="item_nome" value="{{ old('item_nome') }}" required autocomplete="item_nome" autofocus>
                                @error('item_nome')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="pontuacao_item" class="col-md-4 col-form-label text-md-right">{{ __('Pontuação:') }}</label>
                            <div class="col-md-2">
                                
                                <input id="pontuacao_item" type="number" class="form-control @error('pontuacao_item') is-invalid @enderror" name="pontuacao_item" value="{{ old('pontuacao_item') }}" required autocomplete="pontuacao_item" autofocus>
                                @error('pontuacao_item')
                                <div id="validationServer05Feedback" class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
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
