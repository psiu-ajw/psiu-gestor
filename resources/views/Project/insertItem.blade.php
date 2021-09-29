@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Projeto') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('insert.item', ['projeto_id' => $projeto->id]) }}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="Itens" class="col-md-4 col-form-label text-md-right">{{ __('Itens') }}</label>

                            <div class="col-md-6">
                                <select id="item" class="form-control{{ $errors->has('item_id') ? ' is-invalid' : '' }}" name="itens_select[]"  multiple>
									<option hidden disabled selected>Selecione o itens</option>
									@foreach ($itens as $item)
										<option value="{{$item->id}}" {{ old('item') == $item->id ? 'selected' : ''}}   >{{$item->item_nome}}</option>
									@endforeach
								</select>
								@if ($errors->has('item_id'))
									<span class = "invalid-feedback" role="alert">
										{{$errors->first('item_id')}}
									</span>
								@endif
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
