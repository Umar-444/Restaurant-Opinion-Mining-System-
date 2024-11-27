<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\UserFeedbackNotification;
use Illuminate\Support\Facades\Notification;

class SendUserFeedbackNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $customers = User::where('role', 'customer')->get();

        Notification::send($customers, new UserFeedbackNotification($event->user));
    }
}
