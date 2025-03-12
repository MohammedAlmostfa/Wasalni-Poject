<?php

namespace App\Policies;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class TripPolicy
{
    /**
     * Determine whether the user can view any models.
     *
     * @param User $user The authenticated user
     * @return bool Whether the user can view any trips
     */
    public function viewAny(User $user)
    {
        // By default, allow all users to view trips
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user The authenticated user
     * @param Trip $trip The trip to be viewed
     * @return bool Whether the user can view the trip
     */
    public function view(User $user, Trip $trip)
    {
        // By default, allow all users to view a specific trip
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user The authenticated user
     * @return bool Whether the user can create a trip
     */
    public function create(User $user)
    {
        // By default, allow all authenticated users to create trips
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user The authenticated user
     * @param Trip $trip The trip to be updated
     * @return \Illuminate\Auth\Access\Response Whether the user can update the trip
     */
    public function update(User $user, Trip $trip)
    {
        // Deny update if the user is not the owner of the trip
        if ($trip->user_id != $user->id) {
            return Response::deny('You are not allowed to update this trip.');
        }

        // Deny update if the trip has associated bookings
        if ($trip->booking()->exists()) {
            return Response::deny('You cannot update this trip because it has associated bookings.');
        }

        // Allow update if the user is the owner and there are no bookings
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user The authenticated user
     * @param Trip $trip The trip to be deleted
     * @return \Illuminate\Auth\Access\Response Whether the user can delete the trip
     */
    public function delete(User $user, Trip $trip)
    {
        // Deny deletion if the user is not the owner of the trip
        if ($trip->user_id != $user->id) {
            return Response::deny('You are not allowed to delete this trip.');
        }

        // Deny deletion if the trip has associated bookings
        if ($trip->booking()->exists()) {
            return Response::deny('You cannot delete this trip because it has associated bookings.');
        }

        // Allow deletion if the user is the owner and there are no bookings
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user The authenticated user
     * @param Trip $trip The trip to be restored
     * @return bool Whether the user can restore the trip
     */
    public function restore(User $user, Trip $trip)
    {
        // By default, allow all users to restore trips
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user The authenticated user
     * @param Trip $trip The trip to be permanently deleted
     * @return bool Whether the user can permanently delete the trip
     */
    public function forceDelete(User $user, Trip $trip)
    {
        // By default, allow all users to permanently delete trips
        return true;
    }
}
