<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Analysis;
use App\Company;
use App\Continent;
use App\Country;
use App\Data;
use App\Log;
use App\Telemetry;
use App\User;
use App\Well;
use App\Zone;

use App\Imports\DataImport;

class UserController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'username' => 'required|string|min:3|unique:users,username',
            'phone' => 'required|string',
            'cellphone' => 'required|string',
            'company_id' => 'required|numeric',
            'street' => 'nullable|string',
            'number' => 'nullable|numeric',
            'district' => 'nullable|string',
            'complement' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'zip' => 'nullable|numeric'
        ]);

        try{

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->username = $request->username;
            $user->phone = $request->phone;
            $user->cellphone = $request->cellphone;
            $user->status = 'ACTIVE';
            $user->type = 'USER';

            $user->street = $request->street;
            $user->number = $request->number;
            $user->district = $request->district;
            $user->complement = $request->complement;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->save();

            return redirect()->route('login.page')->with('success', 'Account successfully created!');

        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = 0;
            $telemetria->method = 'register';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6'
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password,'status' => 'ACTIVE','type' => 'USER']) ){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('danger','Wrong password, try again!');
        }
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Successfully logged out from account');
    }


    public function registerWell(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
            'zone_id' => 'required|exists:zones,id'
        ]);
        try{

            $well = new Well;
            $well->description = $request->description;
            $well->title = $request->title;
            $well->name = $request->name;
            $well->company_id = Auth::user()->company_id;
            $well->user_id = Auth::user()->id;
            $well->zone_id = $request->zone_id;
            $well->status = 'ACTIVE';
            $well->save();
            
            return redirect()->back()->with('success', 'Well successfully created!');

        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = 0;
            $telemetria->method = 'registerWell';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }
    
    public function statusWell($well_id)
    {

        try{

            $well = Well::find($well_id);
            if(!$well){
                return redirect()->back()->with([
                    'danger' => 'The well informed could not be found'
                ]);
            }
            $counter = 0;
            if($well->status == 'ACTIVE'){
                
                $well->status = 'INACTIVE';
                $well->update();
                
                return redirect()->back()->with('success', 'Well successfully updated!');
            }elseif($well->status == 'INACTIVE'){
                
                $well->status = 'ACTIVE';
                $well->update();

                return redirect()->back()->with('success', 'Well successfully updated!');
            }
            

        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = 0;
            $telemetria->method = 'statusWell';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }
    
    
    public function updatePersonalUserData(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required', 
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'phone' => 'required|string',
            'cellphone' => 'required|string'
        ]);
        try{

            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->cellphone = $request->cellphone;
            $user->update();

            return redirect()->back()->with('success', 'Profile data updated!');
            
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'updatePersonalUserData';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|',
            'confirm_password' => 'required|string|same:new_password',
        ]);
        try{
            $credentials = [
                'email' => Auth::user()->email,
                'password' => bcrypt($request->old_password)
            ];
            if(!Auth::attempt($credentials)){
                return redirect()->back()->with('danger', 'The informed password for the account is wrong');
            }

            $user = Auth::user();
            $user->password = bcrypt($request->new_password);
            $user->update();

            return redirect()->back()->with('success', 'Password updated!');
            
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'updateUserPassword';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function updateUserAddress(Request $request)
    {
        $request->validate([
            'address' => 'sometimes|string',
            'number' => 'sometimes|string',
            'complement' => 'sometimes|string',
            'district' => 'sometimes|string',
            'city' => 'sometimes|string',
            'state' => 'sometimes|string',
            'country' => 'sometimes|string',
            'zip' => 'sometimes|string',
        ]);
        try{
            $user = Auth::user();
            $user->street = $request->address;
            $user->number = $request->number;
            $user->complement = $request->complement;
            $user->district = $request->district;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->update();

            return redirect()->back()->with('success', 'Address updated!');
            
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'updateUserAddress';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function createZone(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'country_id' => 'required|numeric|exists:countries,id',
                'continent_id' => 'required|numeric|exists:continents,id'
            ]);
    
            $zone = new Zone;
            $zone->name = $request->name;
            $zone->country_id = $request->country_id;
            $zone->status = 'ACTIVE';
            $zone->company_id = Auth::user()->company ? Auth::user()->company->id : 0;
            $zone->user_id = Auth::user()->id;
            $zone->save();
            
            return redirect()->back()->with('success', 'Zone created successfully!');
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'createZone';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function updateZone(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'zone_id' => 'required|numeric|exists:zone,id'
            ]);
    
            $zone = Zone::find($request->zone_id);
            $zone->name = $request->name;
            $zone->update();
            
            return redirect()->back()->with('success', 'Zone name updated successfully!');
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'updateZone';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }
    
    public function importWellData(Request $request)
    {
        $request->validate(
            [
                'file'      => $request->excel,
                'extension' => strtolower($request->excel->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:xlsx, xls, xlm, xla, xlc, xlt, xlw',
                'well_id' => 'required|numeric|exists:wells,id'
            ]
        );
        try{
            // dd($request);
            if($request->hasFile('excel')){
                $path = $request->file('excel')->getRealPath();
                Excel::load(request()->file('excel'), function($reader) use ($request){
                    $datas = $reader->get();
                    // dd($datas);
                    if(!empty($datas) && $datas->count()){
                        foreach($datas as $key => $value){
                            $well_data = new Data();
                            if(!$value->depth || !$value->rop ||
                                !$value->rpm || !$value->wob ||
                                !$value->tflo || !$value->stor){
                                
                                $well_data->depth = null;
                                $well_data->rop = null;
                                $well_data->rpm = null;
                                $well_data->wob = null;
                                $well_data->tflo = null;
                                $well_data->stor = null;
                                // dd($value->mse);
                                $well_data->mse = null;
                                $well_data->mi = null;

                            }else{
                                $well_data->depth = $value->depth;
                                $well_data->rop = $value->rop;
                                $well_data->rpm = $value->rpm;
                                $well_data->wob = $value->wob;
                                $well_data->tflo = $value->tflo;
                                $well_data->stor = $value->stor;
                                // dd($value->mse);
                                $well_data->mse = floatval((($value->wob*1000)/117.8588)+((120*PI()*$value->rpm*$value->stor*1000)/(117.8588*($value->rop*3.2808))));
                                $well_data->mi = floatval((36*$value->stor*1000)/(12.25*$value->wob*1000));
                            }
                            $well_data->status = 'ACTIVE';
                            $well_data->well_id = $request->well_id;
                            $well_data->save();
                        }
                    }
                });
            }
            // $excel = Excel::import(new DataImport, request()->file('excel'), $request->well_id);
            // foreach($excel as $data){
            //     $data->well_id = $request->well_id;
            //     $data->save();
            // }

            return redirect()->back()->with('success', 'Data saved successfully!');
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'importWellData';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function processWellData(Request $request)
    {
        $request->validate([
            'well_id' => 'required|exists:wells,id',            
        ]);

        try{

            $guzzle = new Client();

            $well = Well::find($request->well_id);
            foreach($well->datas as $data){
                $dado = [];
                
                $dado['depth'] = $data->depth;
                $dado['rop'] = $data->rop;
                $dado['rpm'] = $data->rpm;                
                $dado['wob'] = $data->wob; 
                $dado['tflo'] = $data->tflo; 
                
                $rows = $dado;
            }
                

            $params = json_encode([
                'rows' => $rows
            ]);

            $res = $guzzle->request('POST', 'https://api.iugu.com/v1/payment_token', [
                'headers' => [
                  'Content-Type' => 'application/json',
                  'Authorization' => 'Basic '.base64_encode($this->token),
                ],
                'body' => $params,
      
            ]);

            $response = json_decode($res->getBody());
            
            // foreach(){
            //     $response['depth'];

            // }
            //Estrutura que vou receber de volta
            /*
                {
                    'depth': [0.5, 1],
                    'wob': [0.75, 2.5],
                    'rop': [5, 10],
                    'mse': [50, 60]
                }
            */

        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'processWellData';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

    public function updateWellInfo(Request $request)
    {
        $request->validate([
            'zone_id' => 'required|exists:zones,id',
            'description' => 'sometimes|string',
            'name' => 'required|string',
            'title' => 'required|string',
            'well_id' => 'required|exists:wells,id'
        ]);
        
        try{
            $well = Well::find($request->well_id);
            $well->zone_id = $request->zone_id;
            $well->description = $request->description;
            $well->name = $request->name;
            $well->title = $request->title;
            $well->update();
    
            return redirect()->back()->with('success', 'Well info updated successfully');
        }catch(\Exception $e){
            $telemetria = new Telemetry;
            $telemetria->user_id = Auth::user()->id??0;
            $telemetria->method = 'updateWellInfo';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Oops, something went wrong with your request']);
        }
    }

}
