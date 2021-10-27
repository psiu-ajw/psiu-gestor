@extends('layouts.app')
@section('content')
@include('popper::assets')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <table class="table-auto">
                <thead>
                  <tr>
                    <th class="p-3">Projeto</th>
                    <th class="p-3">Título</th>
                    <th class="p-3">Descrição</th>
                    <th class="p-3">Andamento</th>
                    <th class="p-3">Ações</th>
                  </tr>
                </thead>
                <tbody>          
                   @foreach ($etapas as $etapa)
                            <tr>
                                <td class="p-3"> 
                                    {{$etapa->projeto->nome_projeto}}
                                </td>
                                <td class="p-3">
                                    {{$etapa->titulo}}
                                </td>
                                <td class="p-3">
                                    {{$etapa->descricao}}
                                </td>
                                <td class="p-3">
                                    {{$etapa->andamento}}
                                </td>
                                <td class="p-3 flex">
                                    <a @popper(Editar etapa) href="{{ url('etapas', ['edit', $etapa->id])}}" class="btn btn-primary mr-2"> 
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a @popper(Excluir etapa) href="{{ url('etapa', ['destroy',$etapa->id])}}" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja excluir a etapa?')"> 
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        
                   @endforeach
                </tbody>
            </table>



            </div>
        </div>
    </div>
</div>
@endsection
