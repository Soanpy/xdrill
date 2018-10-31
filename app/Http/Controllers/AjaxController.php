<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

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
    public function zoneDataAjax($zone_id){
        $response = array();
        $zone = Zone::find($zone_id);
        $response['country']['name'] = $zone->country->name;
        $response['country']['id'] = $zone->country->id;
        $response['continent']['name'] = $zone->continent->name;
        $response['continent']['id'] = $zone->continent->id;
        return response()->json($response);
    }
    
    public function graphDepthWobAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/depth/wob', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }        
    }
    public function graphDepthMseAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/depth/mse', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }        
    }
    public function graphDepthRopAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/depth/rop', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }       
    }
    public function graphRopWobAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/graph/rop', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());

            $resposta = array();
            foreach($response->ROP_WOB as $key => $data){
                $dados = array();
                $resposta['wob'][] = $data;
                $resposta['rop'][] = $key;
            }
            
            return response()->json($resposta);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }       
    }
    
    public function graphMseWobAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/graph/mse', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());

            $resposta = array();
            foreach($response->MSE_WOB as $key => $data){
                $dados = array();
                $resposta['wob'][] = $data;
                $resposta['mse'][] = $key;
            }
            
            return response()->json($resposta);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }      
    }

    public function idealMseAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/ideal/mse', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }      
    }
    
    public function idealRopAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/ideal/rop', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }      
    }

    public function idealWobAjax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/ideal/wob', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }      
    }

    public function idealWob2Ajax($well_id){

        try{
            $rows = array();
            $well = Well::find($well_id);
            foreach($well->datas as $data){
                $dado = [];
                if(
                    !$data->rop ||
                    !$data->depth ||
                    !$data->rpm ||
                    !$data->wob ||
                    !$data->tflo
                ){
                    continue;
                }else{
                    $dado['depth'] = $data->depth;
                    $dado['rop'] = $data->rop;
                    $dado['rpm'] = $data->rpm;                
                    $dado['wob'] = $data->wob; 
                    $dado['tflo'] = $data->tflo; 
                    $rows[] = $dado;
                }
                
            }
            
            $guzzle = new Client();
            
            $params = json_encode([
                'rows' => $rows
            ]);
            $res = $guzzle->request('POST', 'https://xdrill.herokuapp.com/api/v1/xdrill/ideal/wob2', [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $params,
            ]);

            $response = json_decode($res->getBody());
            
            return response()->json($response);
        }catch(\Exception $e){
            echo($e);
            return response()->json(['message' => $e], 500);
        }      
    }
}
