<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;


class ApiController extends Controller
{
    public function login (Request $request) {
            // $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required',
            //     'device_name' => 'required',
            // ]);
        
            $user = User::where('email', $request->email)->first();
        
            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
              $deviceName = 'ipone12';              
            // return $user->createToken($request->device_name)->plainTextToken;
            return $user->createToken($deviceName)->plainTextToken;

    }

    public function create(Request $request)
    {
    	$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $deviceName ='iphone12';
        return $user->createToken($deviceName)->plainTextToken;
        // return $user->createToken($request->device_name)->plainTextToken;

    }

   
}
