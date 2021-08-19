@extends('layouts.app')
@include('popper::assets')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
               @if ($users->count())
               <table class="table-auto">
                <thead>
                  <tr>
                    <th class="p-3">Usuário</th>
                    <th class="p-3">E-mail</th>
                    <th class="p-3">Cadastro</th>
                    <th class="p-3">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  
                
               
                   @foreach ($users as $user)
                        @if (Auth::user()->email != $user->email)
                            <tr>
                                <td class="p-3"> 
                                    {{$user->name}}
                                </td>
                                <td class="p-3">
                                    {{$user->email}}
                                </td>
                                <td class="p-3">{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                                <td class="p-3 flex">
                                    <a href="{{ url('user', ['edit', $user->id])}}" class="btn btn-primary mr-2" @popper(Editar Usuário)> 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                     <a onclick="return confirm('Você tem certeza que deseja excluir o usuário {{$user->name}}?')" href="{{ url('user', ['destroy',$user->id])}}" class="btn btn-danger" @popper(Excluir Usuário)> 
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endif
                   @endforeach
                </tbody>
            </table>
               @else
                   <p>Nenhum usuário cadastrado </p>
               @endif
            </div>
        </div>
    </div>
</div>
@endsection
