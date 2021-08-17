@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Tipo de Projeto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store.item') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="item_nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="item_nome" type="text" class="form-control @error('item_nome') inválido @enderror" name="item_nome" value="{{ old('item_nome') }}" required autocomplete="item_nome" autofocus>
                                @error('item_nome')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
