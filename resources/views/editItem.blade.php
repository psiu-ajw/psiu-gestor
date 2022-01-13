@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Itens de Projeto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.item') }}">
                        @csrf
                        <input id="id" type="hidden" class="form-control" name="id" value="{{ $item->id }}">

                        <div class="form-group row">
                            <label for="item_nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome:') }}</label>

                            <div class="col-md-6">
                                <input id="item_nome" type="text" class="form-control @error('item_nome') inválido @enderror" name="item_nome" value= "{{ $item->item_nome }}" required autocomplete="item_nome" autofocus>
                                @error('item_nome')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrição:') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="description" type="text" class="form-control @error('description') inválido @enderror" name="description" value= "{{ $item->description }}" required autocomplete="description" autofocus> --}}
                                <textarea rows="10" cols="60"  id="description" class="form-control @error('description') inválido @enderror" name="description">
                                    {{ $item->description }}
                                </textarea>
                                @error('description')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
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
