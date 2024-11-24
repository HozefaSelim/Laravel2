<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/login', function(){

//     $email = "ilene17@example.com";
//     $password = "password";

//     $user = User::where('email' ,$email)->first();
//     if($user && Hash::check($password, $user->password)){
//             // store the data in session
//             //Session::put('user',$user);
//             session()->put('a',"ahmed");

//             session('user',$user);
//             return "login successed";
//     }
//     return "invalid email";

// });


Route::get('/user', function(){

   
    // if(Session::has('user')){
          
    //    // $user = Session::get('user');
    //     $user = session('a');
    //         return $user;
    // }

    // session()->flash("status","good");
   // session()->forget('a');
   session()->flush();
  
     $data = session()->all();
     
    

    dd($data);
    return "no user logged in";

});


Route::get('/firedevent',[TestController::class,'fired']);
Route::get('/register',[TestController::class,'register']);
Route::get('/login',[TestController::class,'login']);
Route::get('/send-email',[TestController::class,'sendEmail']);
Route::get('/test8',[UserController::class,'test8']);


