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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'username' => 'required|string|min:3|unique:users,username',
            'phone' => 'required|string',
            'cellphone' => 'required|string',
            'company_id' => 'required|numeric',
            'street' => 'string',
            'number' => 'string',
            'district' => 'string',
            'complement' => 'string',
            'city' => 'string',
            'state' => 'string',
            'country' => 'string',
            'zip' => 'string'
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

            return route('dashboard')->with('success', 'You have been successfully registered and logged in!');

        }catch(\Exception $e){
            $telemetria = new Telemetria;
            $telemetria->user_id = 0;
            $telemetria->method = 'register';
            $telemetria->controller = 'UserController';
            $telemetria->description = $e->getMessage();
            $telemetria->save();

            return redirect()->back()->with(['danger' => 'Ops, ocorreu um erro com sua solicitação!']);
        }
    }
}
