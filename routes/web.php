<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->stateless()->redirect();
// });

// Route::get('/auth/callback', function () {
//     $callBackUser = Socialite::driver('google')->stateless()->user();
//     if(!User::where('email',$callBackUser->email)->first()) {
//         $newUser=User::create([
//             'name' =>$callBackUser->name,
//             'email' =>$callBackUser->email
//         ]);
//         $deviceName = 'ipone13';              

//         return $newUser->createToken($deviceName)->plainTextToken;

//     }
//     else {
//         $user = User::where('email', $callBackUser->email)->first();

//         return $user->createToken($deviceName)->plainTextToken;

//     }
// });
