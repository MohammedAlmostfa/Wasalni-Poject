<?php

namespace App\Listeners;

use App\Mail\VerifyEmail;
use App\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerificationEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->data;
        $verifkey = $event->key;

        // Retrieve the verification code from the cache
        $code = Cache::get($verifkey);

        if (!$code) {
            Log::error('Verification code not found in cache for user: ' . $user['email']);
            return;
        }

        // Send the verification email
        Mail::to($user['email'])->send(new VerifyEmail($user, $code));
    }
}
