<?php

namespace App\Listeners;

use App\Events\FiredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FiredEventListener implements ShouldQueue
{


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FiredEvent $event): void
    {
        $event->user->name = "mohamed";
        $event->user->save();
   }
}
