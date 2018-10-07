<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

use Illuminate\Validation\Rule;

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

use Maatwebsite\Excel\Facades\Excel;

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

        if(\Auth::attempt(['email' => $request->email,'password' => $request->password,'status' => 'ACTIVE','type' => 'USER']) ){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('danger','Wrong password, try again!');
        }
    }


    public function registerWell(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required',
        ]);

        try{

            $well = new Well;
            $well->description = $request->description;
            $well->title = $request->title;
            $well->name = $request->name;
            $well->company_id = Auth::user()->company_id;
            $well->user_id = Auth::user()->id;
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

}
