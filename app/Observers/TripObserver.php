<?php

namespace App\Observers;

use App\Models\Trip;

class TripObserver
{
    /**
     * Handle the Trip "created" event.
     */
    public function created(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Trip "updated" event.
     */
    public function updated(Trip $trip): void
    {
        // Check if available_seats was changed and is now 0
        if ($trip->wasChanged('available_seats') && $trip->available_seats == 0) {
            $this->markTripAsComplete($trip);
        }
    }

    /**
     * Handle the Trip "deleted" event.
     */
    public function deleted(Trip $trip): void
    {
        //
    }

    /**
     * Handle the Trip "restored" event.
     */
    public function restored(Trip $trip): void
    {
        //
    }

    /**
     * Mark the trip as complete.
     */
    protected function markTripAsComplete(Trip $trip): void
    {
        // Only update if the status is not already 'Complete'
        if ($trip->status !== 'Complete') {
            $trip->status = 'Complete';
            $trip->save();
        }
    }
}
