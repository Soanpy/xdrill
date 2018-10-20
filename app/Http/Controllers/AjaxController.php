<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Country;
use App\Well;
use App\Zone;

class AjaxController extends Controller
{
    public function countriesAjax(){
        $continent_id = Input::get('continent_id');
        $countries = Country::where('continent_id', $continent_id)->where('status', 'ACTIVE')->get();
        return response()->json($countries);
    }

    public function zonesAjax(){
        $country_id = Input::get('country_id');
        $zones = Zone::where('country_id', $country_id)->where('status', 'ACTIVE')->get();
        return response()->json($zones);
    }
    
    public function graphDepthWobAjax($well_id){

        try{
            $response = [];
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $response['wob'][] = $data->wob;
                $response['depth'][] = $data->depth;
            }

            return response()->json($response);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error trying to get the graph'], 500);
        }        
    }
}
