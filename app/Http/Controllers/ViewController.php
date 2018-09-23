<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('administrativo.dashboard');
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
