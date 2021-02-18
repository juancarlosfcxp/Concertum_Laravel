@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Eventos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            @foreach($eventos as $evento)
                                @if($evento->entradasDisponibles>0 && $evento->fechaHora>=date('Y-m-d H:i:s') || Session::has('manager'))
                                <div class="col-12 col-md-6 col-lg-4 my-4">
                                    <div class="card" style="width: 18rem;">
                                        <a  class="card-title text-uppercase pt-3 pl-3"  href={{ Session::has('manager') ? 'eventoFormEditar'.$evento->id : 'detalleEvento'.$evento->id }}>
                                            <h4>{{$evento->titulo}}</h4>
                                        </a>
                                        <hr>
                                        <a href={{"detalleEvento$evento->id"}} >
                                            <img class="card-img-top" src="{{Storage::url($evento->imagen)}}" alt="portada">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-text"><strong>{{$evento->artista}}</strong></p>
                                            <p class="card-text"><strong>{{$evento->fechaHora}}</strong></p>
                                            <div class="row">
                                                <div class="col-5">
                                                    <label>Precio</label>
                                                    <h3>{{$evento->precio}}€</h3>
                                                </div>
{{--                                                <div class="col-5 offset-2">--}}
{{--                                                    <label>Recaudado</label>--}}
{{--                                                    <h3>{{$evento->totalRecaudado()}}€</h3>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endif
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
