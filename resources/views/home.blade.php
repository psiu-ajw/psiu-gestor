@extends('layouts.app')
@section('pageTitle', ' - Principal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-md">
                <div class="card-header bg-gray-200"><h4 class="text-2xl font-extrabold">Área de Trabalho</h4></div>
                <div class="card-body bg-white">
                    <div class="bg-white p-3 rounded">
                        <div class="grid grid-cols-3 gap-2">
                            
                            <a href="{{route('users')}}" class="bg-gray-80 hover:bg-gray-100 rounded shadow-xl hover:shadow-md hover:no-underline p-10">
                                <div class="h-12 w-12 bg-gradient-to-r from-red-500 to-yellow-600 flex items-center justify-center rounded-md shadow-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-50" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                      </svg>
                                    
                                </div>
                                <h3 class="text-sm font-bold mt-4">Usuários</h3>
                            </a>
                            <a href="{{ route('index.project') }}" class="bg-gray-80 hover:bg-gray-100 rounded shadow-xl hover:shadow-md hover:no-underline p-10">
                                <div class="h-12 w-12 bg-gradient-to-r from-red-500 to-yellow-600 flex items-center justify-center rounded shadow-xl">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>

                                </div>
                                <h3 class="text-sm font-bold mt-4">Projetos</h3>
                            </a>
                            <a href="{{ route('index.item') }}" class="bg-gray-80 hover:bg-gray-100 rounded shadow-xl hover:shadow-md hover:no-underline p-10">
                                <div class="h-12 w-12 bg-gradient-to-r from-red-500 to-yellow-600 flex items-center justify-center rounded shadow-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-50" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                    </svg>
                                </div>
                                <h3 class="text-sm font-bold mt-4">Itens</h3>
                            </a>  
                            <a href="communities" class="mt-10  bg-gray-80 hover:bg-gray-100 rounded shadow-xl hover:shadow-md hover:no-underline p-10">
                                <div class="h-12 w-12 bg-gradient-to-r from-red-500 to-yellow-600 flex items-center justify-center rounded shadow-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                      </svg>
                                </div>
                                <h3 class="text-sm font-bold mt-4">Comunidades</h3>
                            </a> 
                            <a href="{{route('informes')}}" class="mt-10  bg-gray-80 hover:bg-gray-100 rounded shadow-xl hover:shadow-md hover:no-underline p-10">
                                <div class="h-12 w-12 bg-gradient-to-r from-red-500 to-yellow-600 flex items-center justify-center rounded shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                </div>
                                <h3 class="text-sm font-bold mt-4">Informes</h3>
                            </a> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
