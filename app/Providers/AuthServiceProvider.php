<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Trip;
use App\Models\Booking;
use App\Models\FavoritePerson;
use App\Models\Rating;
use App\Policies\TripPolicy;
use App\Policies\BookingPolicy;
use App\Policies\RatingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Trip::class => TripPolicy::class,
        Booking::class=>BookingPolicy::class,
        Rating::class=>RatingPolicy::class,
        FavoritePerson::class=>FavoritePerson::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
