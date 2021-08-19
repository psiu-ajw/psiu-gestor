@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Informes') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registra_informes') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="projeto" class="col-md-4 col-form-label text-md-right">Selecione o Projeto:</label>

                            <div class="col-md-6">
                            <select name="projeto" class="form-control @error('projeto') inválido @enderror" name="projeto" value="{{ old('projeto') }}" required autocomplete="projeto" >
                    <option value="">--- Selecione o Projeto deste Informe ---</option>
                    @foreach ($projeto as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    @error('projeto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txt_informe" class="col-md-4 col-form-label text-md-right">{{ __('Insira o texto informativo') }}</label>

                            <div class="col-md-6">
                                <input id="txt_informe" type="text" class="form-control @error('txt_informe') inválido @enderror" name="txt_informe" value="{{ old('txt_informe') }}" required autocomplete="txt_informe">

                                @error('txt_informe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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
