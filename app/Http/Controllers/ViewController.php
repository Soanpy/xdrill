<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Analysis;
use App\Company;
use App\Continent;
use App\Country;
use App\Data;
use App\Log;
use App\Telemetry;
use App\User;
use App\Well;
use App\WellAnalysis;
use App\Zone;

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

    public function userRegisterWell()
    {   
        $continents = Continent::all();
        return view('administrativo.pocos.cadastrar')->with([
            'continents' => $continents
        ]);
    }

    public function userWells()
    {   
        return view('administrativo.pocos.pocos');
    }

    public function userWell($well_id)
    {   
        $well = Well::find($well_id);
        if(!$well){
            return redirect()->back()->with([
                'danger' => 'Informed well could not be found, select a valid one.'
            ]);
        }
        return view('administrativo.pocos.perfil')->with([
            'well' => $well
        ]);
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

    public function systemUserProfile()
    {
        return view('administrativo.profile.perfil');
    }

    public function createZone()
    {
        $continents = Continent::all();

        return view('administrativo.zones.create')->with(['continents' => $continents]);
    }

    public function zones()
    {
        return view('administrativo.zones.zones');
    }
}
