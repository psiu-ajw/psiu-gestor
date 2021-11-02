@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>
                        {{ $projeto->nome_projeto }}
                    </div>
                    <div>
                        {{ $projeto->comunidade->name }}
                    </div>
                    <div>
                        {{ $projeto->pontuacao }}
                    </div>
                    <h1>Itens do projeto</h2>
                    @foreach ($projeto->itens as $item)
                        <div>
                            {{ $item->item_nome }}
                        </div>
                        <div>
                            {{ $item->description }}
                        </div>
                        <div>
                            <img src="{{ asset('../storage/app/public/item/'.$item->imagem) }}" alt="" style="height:50px;"> 
                        </div>
                        <div>
                            {{ $item->pivot->pontuacao_item }}
                        </div>
                    @endforeach

                        
                </div>
            </div>
        </div>
    </div>
@endsection