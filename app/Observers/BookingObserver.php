<?php

namespace App\Observers;

use App\Models\Trip;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     */
    public function created(Booking $booking): void
    {
        // Logic for when a booking is created
    }

    /**
     * Handle the Booking "updated" event.
     */
    public function updated(Booking $booking): void
    {
        // Check if the status was changed to "accepted"
        if ($booking->isDirty('status') && $booking->status === 'accepted') {
            $this->adjustAvailableSeats($booking);
        }
    }

    /**
     * Handle the Booking "deleted" event.
     */
    public function deleted(Booking $booking): void
    {
        // Logic for when a booking is deleted
    }

    /**
     * Handle the Booking "restored" event.
     */
    public function restored(Booking $booking): void
    {
        // Logic for when a booking is restored
    }

    /**
     * Handle the Booking "force deleted" event.
     */
    public function forceDeleted(Booking $booking): void
    {
        // Logic for when a booking is force deleted
    }

    /**
     * Adjust available seats when a booking is accepted.
     */
    protected function adjustAvailableSeats(Booking $booking)
    {
        DB::transaction(function () use ($booking) {
            $trip = $booking->trip()->lockForUpdate()->first();
            $trip->available_seats -= $booking->seats_number;
            $trip->save();


        });
    }

    /**
     * Mark the trip as completed if no seats are available.
     */
    protected function markTripAsCompletedIfNeeded(Trip $trip)
    {

    }
}
