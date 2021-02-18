<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $fillable = [
        'titulo', 'artista','descripcion','fechaHora','lugar','aforo','entradasDisponibles','imagen','precio','user_id'
    ];
    //
}
