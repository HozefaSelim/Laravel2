<?php

namespace App\Http\Controllers;

use App\Events\FiredEvent;
use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Mail\OrderShipped;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
class TestController extends Controller
{
    //

    public function fired(){
        $user = User::find(194);
       // event(new FiredEvent($user));
        FiredEvent::dispatch($user);
        return "done";

    }


    public function register(){
        $user = User::find(194);

        event(new UserRegistered($user));

        return "register";
    }
    public function login(){
        $user = User::find(194);

        event(new UserLoggedIn($user));
        
        return "loggedIn";
    }
    public function sendEmail(){
        $user = User::find(194);

     //   Mail::to("ahmed@gmail.com")->send(new OrderShipped($user));
        Mail::to($user->email)->send(new SendEmail());
        return "email sended ";
    }


}
