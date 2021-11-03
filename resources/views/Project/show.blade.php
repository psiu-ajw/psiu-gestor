@extends('layouts.app')
@section('content')
    <div class="shadow p-4 bg-white rounded container-fluid col-md-8" style="overflow-x: auto;">
        <h1 class="text-center font-bold text-lg">Dados do projeto</h1> <br>
        <div class="center">
            <table id="tabela_dados" class="table table-hover">
                <thead class="bg-gray-300">
                    <tr>
                        <th>Nome</th>
                        <th>Bairro / Comunidade</th>
                        <th>Pontuação</th>
                        <th style="width: 15%">Opções</th>
                    </tr>
                </thead>
                <tr>
                    <td>{{ $projeto->nome_projeto }}</td>
                    <td>{{ $projeto->comunidade->name }}</td>
                    <td>{{ $projeto->pontuacao }}</td>
                    <td>
                        <a @popper(Editar Projeto) href="{{ route('edit.project', ['id' => $projeto->id]) }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a @popper(Excluir Projeto) onclick="return confirm('Você tem certeza que deseja excluir o projeto: {{$projeto->nome_projeto}}?')" href="{{ route('delete.project', ['id' => $projeto->id]) }}" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </table>
            <h1 class="text-center font-bold text-lg">Itens do projeto</h1> <br>
            <div class="center">
                <table id="tabela_dados" class="table table-hover">
                    <thead class="bg-gray-300">
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Imagem</th>
                            <td>Pontos</td>
                            <th style="width: 15%">Opções</th>
                        </tr>
                    </thead>
                    @foreach ($projeto->itens as $item)
                        <tr>
                            <td>{{ $item->item_nome }}</td>
                            <td>{{ $item->description }}</td>
                            <td> <img src="{{ asset('../storage/app/public/item/'.$item->imagem) }}" alt="" style="height:70px;"> </td>
                            <td>{{ $item->pivot->pontuacao_item }}</td>
                            <td>
                                <a @popper(Editar Projeto) 
                                href="{{ route('item.projeto.edit', ['id' => $item->pivot->id]) }}"
                                class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a @popper(Excluir Projeto) onclick="return confirm('Você tem certeza que deseja excluir o item: {{$item->item_nome}}?')" href="{{ route('item.projeto.delete', ['id' => $item->pivot->id]) }}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection