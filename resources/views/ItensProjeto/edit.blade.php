@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Digite o novo valor para a pontuação') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('item.projeto.update') }}">
                            @csrf
                            <input id="id" type="hidden" class="form-control" name="id" value="{{ $itemProjeto->id }}">
                            <div class="form-group row">
                                <label for="pontuacao_item" class="col-md-4 col-form-label text-md-right">{{ __('Pontos') }}</label>
                                <div class="col-md-6">
                                    <input  id="pontuacao_item" type="number" class="form-control @error('pontuacao_item') inválido @enderror" name="pontuacao_item" value="{{ $itemProjeto['pontuacao_item'] }}" required autocomplete="pontuacao_item">
                                    @error('pontuacao_item')
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