<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Categoria;
use App\Produto;
use App\User;
use App\Telemetria;
use App\Orcamento;
use App\Segmento;

use App\Http\Controllers\UserController;


class ViewController extends Controller
{

    public function index()
    {   
    	return view('administrativo.login');
    }

    public function admin()
    {
        return view('administrativo.login');
    }

    public function register()
    {   
    	return view('administrativo.register');
    }

    public function systemDashboard()
    {   
        $user = Auth::user();
        $wells = $user->wells;
        $analyses = 0;
        $analyses_week = array();
        if(count($wells) > 0){
            foreach($wells as $well){
                if(count($well->analyses) > 0){
                    $analyses += count($well->analyses);
                    foreach($well->analyses as $analysis){
                        if(strtotime('now') < strtotime('+7days', strtotime($analysis->created_at))){
                            $analyses_week[] = $analysis;
                        }
                    }
                }
            }
        }
        return view('administrativo.dashboard')->with([
            'analyses' => $analyses,
            'analyses_week' => $analyses_week
        ]);
    }

    public function userCadastrarPoco()
    {   
        return view('administrativo.pocos.cadastrar');
    }

    public function userPocos()
    {   
        return view('administrativo.pocos.pocos');
    }

    public function userPoco()
    {   
        return view('administrativo.pocos.perfil');
    }
    
    public function userUsersAtivos()
    {   
        return view('administrativo.usuarios.usuarios');
    }
    
    public function userUsersInativos()
    {   
        return view('administrativo.usuarios.usuarios');
    }
    
    public function userUsersPerfil()
    {   
        return view('administrativo.usuarios.perfil');
    }

    
}
