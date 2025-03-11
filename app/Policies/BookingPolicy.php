<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class BookingPolicy
{
    /**
     * Determine whether the user can update the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be updated
     * @return bool Whether the user is allowed to update the booking
     */
    public function update(User $user, Booking $booking)
    {
        // Allow update only if the booking belongs to the user and is in "pending" status
        if ($booking->user_id == $user->id && $booking->status == "pending") {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be deleted
     * @return bool Whether the user is allowed to delete the booking
     */
    public function delete(User $user, Booking $booking)
    {
        // Allow deletion only if the booking belongs to the user and is in "pending" status
        if ($booking->user_id == $user->id && $booking->status == "pending") {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be restored
     * @return bool Whether the user is allowed to restore the booking
     */
    public function restore(User $user, Booking $booking)
    {
        // Logic for restoring a booking can be added here
        // Currently, no restrictions are applied
        return true;
    }

    /**
     * Determine whether the user can accept the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be accepted
     * @return bool Whether the user is allowed to accept the booking
     */
    public function accept(User $user, Booking $booking)
    {
        // Allow acceptance only if:
        // 1. The booking belongs to the user's trip
        // 2. The booking is in "pending" or "accepted" status
        if ($booking->trip->user_id == $user->id && ($booking->status == "pending" || $booking->status == "accepted")) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can reject the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be rejected
     * @return bool Whether the user is allowed to reject the booking
     */
    public function reject(User $user, Booking $booking)
    {
        // Allow rejection only if:
        // 1. The booking belongs to the user's trip
        // 2. The booking is in "pending" or "rejected" status
        if ($booking->trip->user_id == $user->id && ($booking->status == "pending" || $booking->status == "rejected")) {
            return true;
        }
        return false;
    }
}
