<?php

namespace App\Providers;

use App\Models\Booking;

use App\Events\Registered;
use App\Observers\BookingObserver;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendVerificationEmail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

            Registered::class => [
        SendVerificationEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        Booking::observe(BookingObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
