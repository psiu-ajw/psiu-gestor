@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

                <div class="row justify-content-center">
                {{-- Card Tipo projetos --}}
                <div class="col-sm-4">
                    <div id="card">
                        <a id="link-card" href="{{route('index')}}">
                            <div class="row justify-content-center">
                                <img id="card-image" src="#" alt="">
                            </div>
                            <div class="row justify-content-center">
                                <div id="card-text">Tipo projetos</div>
                            </div>
                        </a>
                    </div>
                </div> 


            {{-- Card projetos --}}

                
                        <div class="col-sm-4">
                            <div id="card">
                                <a id="link-card" href="#">
                                    <div class="row justify-content-center">
                                        <img id="card-image-categorias" src="#" alt="">
                                    </div>
                                    <div class="row justify-content-center">
                                        <div id="card-text">projetos</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
    </div>
            


@endsection

@section('javascript')
<script>
    function alerta(){
        alert("Funcionalidade em desenvolvimento");
    }
</script>
@endsection