<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RatingPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function createtrip(User $user, $booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($user->id != $booking->user_id) {
            return Response::deny('You are not allowed to create a rating for this booking.');
        }

        $trip = $booking->trip;
        if ($trip->status != "ending") {
            return Response::deny('The trip is not ending.');
        }
        return Response::allow();

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Rating $rating)
    {
        if ($user->id != $rating->user_id) {
            return Response::deny('You are not allowed to update this rating.');
        }

        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Rating $rating)
    {
        if ($user->id != $rating->user_id) {
            return Response::deny('You are not allowed to delete this rating.');
        }

        return Response::allow();
    }
}
