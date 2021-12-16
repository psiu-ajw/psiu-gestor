@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Inserir Pontuação') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('insert.item', ['projeto_id' => $projeto]) }}">
                            @csrf
                            <input id="id_projeto" type="hidden" class="form-control" name="id" value="{{$projeto}}">
                            <div class="form-group row">
                                @foreach($itens as $item)
                                <label for="Itens" class="col-md-4 col-form-label text-md-right">{{ __($item->item_nome.':') }} </label>
                                    <div class="col-md-2 mb-4">
                                        <input id="pontuacao_item" type="number" class="form-control @error('pontuacao_item') is-invalid @enderror" name="pontuacao_item[{{$item->id}}][]" value="{{ old('pontuacao_item') }}" required autocomplete="pontuacao_item" autofocus>
                                        @error('pontuacao_item')
                                        <div id="validationServer05Feedback" class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-primary">
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
