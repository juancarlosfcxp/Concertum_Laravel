<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;

class eventoController extends Controller
{
    public function showForm() {
        return view("eventoForm");
    }

    public function showFormEditar($id) {
        $detalle=evento::query()
            ->where('id', $id)
            ->first();
        return view("eventoForm",compact('detalle'));
    }

    public function crearEvento(Request $request) {

        $evento = new evento();
        $evento->titulo=$request->input("titulo");
        $evento->artista=$request->input("artista");
        $evento->descripcion=$request->input("descripcion");
        $evento->fechaHora=$request->input("fechaHora");
        $evento->lugar=$request->input("lugar");
        $evento->aforo=$request->input("aforo");
        $evento->entradasDisponibles=$request->input("aforo");
        $evento->imagen=$request->file("imagen")->store("public");
        $evento->precio=$request->input("precio");
        $evento->user_id=auth()->id();

        $evento->save();
//        $eventos = evento::all();
//        return view("home",compact('eventos'));
        return redirect()->route('home');
    }

    public function editarEvento(Request $request) {

        $evento=evento::query()
            ->where('id', $request->input("id"))
            ->first();
        $evento->titulo=$request->input("titulo");
        $evento->artista=$request->input("artista");
        $evento->descripcion=$request->input("descripcion");
        if($request->input("fechaHora")){
            $evento->fechaHora=$request->input("fechaHora");
        }
        $evento->lugar=$request->input("lugar");
        $evento->aforo=$request->input("aforo");
        $evento->entradasDisponibles=$request->input("aforo");
        if($request->file("imagen")){
            $evento->imagen=$request->file("imagen")->store("public");
        }
        $evento->precio=$request->input("precio");
        $evento->user_id=auth()->id();

        $evento->save();
        return redirect()->route('manager');
    }

    public function borrarEvento($id) {

        $evento=evento::query()
            ->where('id', $id)
            ->first();

        $evento->delete();
        return redirect()->route('manager');
    }

    public function showDetalle($id){
        $detalle=evento::query()
            ->where('id', $id)
            ->first();
        return view("detalle",compact('detalle'));
    }
}
