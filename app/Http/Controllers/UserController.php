<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

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
}
