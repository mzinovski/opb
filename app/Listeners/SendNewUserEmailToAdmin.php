<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewClientNotification;

class SendNewUserEmailToAdmin
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
    public function handle(object $event): void
    {
        $admins = User::role('admin')->get();
        foreach ($admins as $admin) {
            Notification::route('mail',  $admin->email)->notify(new NewClientNotification());
        }
    }
}
