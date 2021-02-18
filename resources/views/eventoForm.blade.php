@extends('layouts.app')

@section('content')
    <div class="container" style="width: 700px; margin: auto;">
        <form name="EventoForm" id="EventoForm" action='{{ isset($detalle)? "/editarEvento" : "/crearEvento" }}' method="post" enctype="multipart/form-data">
            @csrf
            <fieldset
            @if(isset($detalle))
                @if($detalle->entradasDisponibles<$detalle->aforo)
                    disabled="disabled"
                @endif
            @endif
            >
            @if(isset($detalle))
                <input type="hidden" name="id" id="id" value={{$detalle->id}}>
            @endif
            <div class="form-group">
                <input type="text" class="form-control" id="titulo" name="titulo" value='{{ isset($detalle)? $detalle->titulo :"" }}' placeholder="Titulo del Evento">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="artista" name="artista" value='{{ isset($detalle)? $detalle->artista :"" }}' placeholder="Nombre del Artista">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ isset($detalle)? $detalle->descripcion :"" }}</textarea>
            </div>
            <div class="form-group row align-items-end">
                <div class="col-4">
                    <label for="fechaHora">Fecha y Hora</label>
                    <input type="datetime-local" class="form-control" id="fechaHora" value='{{ isset($detalle)? $detalle->fechaHora :"" }}' name="fechaHora">
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" id="lugar" name="lugar" value='{{ isset($detalle)? $detalle->lugar:"" }}' placeholder="Lugar">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label for="aforo">Aforo</label>
                    <input type="number" class="form-control" id="aforo" value='{{ isset($detalle)? $detalle->aforo :"" }}' name="aforo">
                </div>
                <div class="col-3">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" value='{{ isset($detalle)? $detalle->precio :"" }}' name="precio">
                </div>
                <div class="col-6">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control-file" id="imagen" value='{{ isset($detalle)? $detalle->imagen :"" }}' name="imagen">
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-block font-weight-bolder ">Continuar</button>
            </fieldset>
        </form>
        @if(isset($detalle))
            <a href={{'eventoBorrar'.$detalle->id}}>
                <button disabled='{{$detalle->entradasDisponibles<$detalle->aforo}}' class="btn btn-danger btn-block font-weight-bolder my-4 ">Eliminar Evento</button>
            </a>
        @endif
    </div>
@endsection
