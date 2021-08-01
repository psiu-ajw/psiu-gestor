@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               @if ($user->count())
               <table class="table-auto">
                <thead>
                  <tr>
                    <th class="p-3">Usuário</th>
                    <th class="p-3">E-mail</th>
                    <th class="p-3">Cadastro</th>
                    <th class="p-3">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-3">{{$user->getAttributes()['name']}}</td>
                        <td class="p-3">{{$user->getAttributes()['email']}}</td>
                        <td class="p-3">{{\Carbon\Carbon::parse($user->getAttributes()['created_at'])->format('d/m/Y')}}</td>
                        <td class="p-3 flex">
                            <a href="{{ url('user', ['edit', $user->id])}}"> 
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
            
               @else
                   <p>Nenhum usuário cadastrado </p>
               @endif
            </div>
            <div class="col-md-6 mt-4">
                <a href="user/changepassword" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center hover:no-underline">
                    Mudar a senha
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
