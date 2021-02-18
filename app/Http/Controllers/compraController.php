<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;
use App\compra;

class compraController extends Controller
{
    //
    public function crearCompra(Request $request) {
        $compra = new compra();

        $compra->evento_id=$request->input("evento_id");
        $compra->user_id=auth()->id();

        $compra->save();
        $evento=evento::query()
            ->where('id', $request->input("evento_id"))
            ->first();
        $evento->entradasDisponibles--;
        $evento->save();
        return redirect()->route('home');
    }
}
