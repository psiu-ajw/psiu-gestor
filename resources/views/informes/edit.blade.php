@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Informe') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('informes.save') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="txt_informe" class="col-md-4 col-form-label text-md-right">{{ __('txt_informe') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="hidden" class="form-control" name="id" value="{{ $informes->id }}">
                                <input id="txt_informe" type="text" class="form-control @error('txt_informe') is-invalid @enderror" name="txt_informe" value="{{ $informes->txt_informe }}" required autocomplete="txt_informe" autofocus>

                                @error('name')
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
