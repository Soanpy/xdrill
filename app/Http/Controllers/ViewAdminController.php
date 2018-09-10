<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Segmento;

class ViewAdminController extends Controller
{
    //

    public function perfil()
    {
        return view('administrativo.perfil');
    }

    public function segmentos()
    {
        $segmentos = Segmento::all();
        return view('administrativo.segmentos.lista',compact('segmentos'));
    }
}
