@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron col-12">
                <h1 class="display-4 text-uppercase">{{$detalle->titulo}}</h1>
                <img class="" style="max-width: 600px" src="{{Storage::url($detalle->imagen)}}">
                <h3 class="display-6 text-uppercase">{{$detalle->artista}}</h3>
                <p class="lead">{{$detalle->descripcion}}</p>
                <hr class="my-4">
                <p>Fecha: {{$detalle->fechaHora}}</p>
                <p>Lugar: {{$detalle->lugar}}</p>
                <p>Aforo: {{$detalle->aforo}}</p>
                <p>Entradas Disponibles{{$detalle->entradasDisponibles}}</p>
                <label>Precio</label>
                <h3>{{$detalle->precio}}€</h3>
            </div>
            <form name="proyectoForm" id="proyectoForm" action="/comprar" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value=1>
                <input type="hidden" class="form-control" id="evento_id" name="evento_id" value={{$detalle->id}}>
                    <button type="submit" class="btn btn-success">Comprar</button>
            </form>
        </div>
    </div>

@endsection

