<?php

namespace App\Policies;

use App\Models\Trip;
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
     * @return \Illuminate\Auth\Access\Response|bool Whether the user is allowed to update the booking
     */
    public function update(User $user, Booking $booking)
    {
        // Allow update only if the booking belongs to the user and is in "pending" status
        if ($booking->user_id == $user->id && $booking->status == "pending") {
            return true;
        }
        return Response::deny('You are not allowed to update this booking.');
    }

    /**
     * Determine whether the user can delete the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be deleted
     * @return \Illuminate\Auth\Access\Response|bool Whether the user is allowed to delete the booking
     */
    public function delete(User $user, Booking $booking)
    {
        // Allow deletion only if the booking belongs to the user and is in "pending" status
        if ($booking->user_id == $user->id && $booking->status == "pending") {
            return true;
        }
        return Response::deny('You are not allowed to delete this booking.');
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
     * @return \Illuminate\Auth\Access\Response|bool Whether the user is allowed to accept the booking
     */
    public function accept(User $user, Booking $booking)
    {
        // Condition 1: The user must be the owner of the trip
        if ($booking->trip->user_id != $user->id) {
            return Response::deny('You are not allowed to accept this booking.');
        }

        // Condition 2: The booking must be in "pending" or "accepted" status
        if ($booking->status != "pending" && $booking->status != "accepted") {
            return Response::deny('The booking is not in a valid status for acceptance.');
        }

        // Condition 3: There must be enough available seats
        if ($booking->trip->available_seats < $booking->seats_number) {
            return Response::deny('There are not enough available seats.');
        }

        // If all conditions are met, allow acceptance
        return true;
    }

    /**
     * Determine whether the user can reject the booking.
     *
     * @param User $user The authenticated user
     * @param Booking $booking The booking to be rejected
     * @return \Illuminate\Auth\Access\Response|bool Whether the user is allowed to reject the booking
     */
    public function reject(User $user, Booking $booking)
    {
        // Allow rejection only if:
        // 1. The booking belongs to the user's trip
        // 2. The booking is in "pending" or "rejected" status
        // Condition 1: The user must be the owner of the trip
        if ($booking->trip->user_id != $user->id) {
            return Response::deny('You are not allowed to reject this booking.');
        }

        // Condition 2: The booking must be in "pending" or "rejected" status
        if ($booking->status != "pending" && $booking->status != "rejected") {
            return Response::deny('The booking is not in a valid status for rejection.');
        }

        // If all conditions are met, allow rejection
        return true;
    }
}
