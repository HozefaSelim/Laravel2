<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Events\UserRegistered;
use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class UserEventSubscriber
{
    public function subscribe($events){
            return [
                UserRegistered::class => 'handleUserRegistered',
                UserLoggedIn::class => 'handleUserLoggedIn',
            ];
    }

    public function handleUserRegistered(UserRegistered $event){
        $user = $event->user;
        Mail::to($user->email)->send(new SendEmail($user));
    }
    public function handleUserLoggedIn(UserLoggedIn $event){
        $user = $event->user;
        Mail::to($user->email)->send(new SendEmail($user));
    }
}
