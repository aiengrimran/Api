<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



class ApiController extends Controller
{
    public function login (Request $request) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
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
        $user = User::where('email', $request->email)->first();
        if($user) {
            return $user->createToken('iphone13')->plainTextToken;

        }else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'photo' => $request->photo, 
            ]);
            $deviceName ='iphone12';
            return $user->createToken($deviceName)->plainTextToken;
            // return $user->createToken($request->device_name)->plainTextToken;
        }   

    }
    public function logout (Request $request) {
    
    	$request->user()->tokens()->delete();
    	
    	return 'user Logged out';
    }

    

   
}
