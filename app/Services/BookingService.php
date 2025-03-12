<?php

namespace App\Services;

use Exception;
use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingService
{


    public function showhisbookings()
    {
        try {
            $booking=Booking::all();
            return [
                            'message' => 'All trips retrieved successfully',
                            'data' => $$booking,
                            'status' => 200,
                        ];

        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in createBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to create booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }
    /**
     * Create a new booking.
     *
     * @param array $data Booking data (trip_id, seats_number, etc.)
     * @return array Response containing status, message, and data
     */
    public function createBooking($data)
    {
        try {
            // Check if the trip exists
            $trip = Trip::find($data['trip_id']);
            if (!$trip) {
                return [
                    'message' => 'Trip not found',
                    'status' => 404,
                ];
            }

            // Create a new booking
            $booking = Booking::create([
                'trip_id' => $data['trip_id'],
                'seats_number' => $data['seats_number'],
                'user_id' => Auth::user()->id,
            ]);

            // Return success response
            return [
                'message' => 'Booking created successfully',
                'status' => 200,
                'data' => $booking,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in createBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to create booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }

    /**
     * Update an existing booking.
     *
     * @param array $data Updated booking data
     * @param Booking $booking The booking to update
     * @return array Response containing status, message, and data
     */
    public function updateBooking($data, Booking $booking)
    {
        try {
            // Fill the booking with new data
            $booking->fill([
                'trip_id' => $data['trip_id'] ?? $booking->trip_id,
                'seats_number' => $data['seats_number'] ?? $booking->seats_number,
            ]);

            // Save the updated booking
            $booking->save();

            // Return success response
            return [
                'message' => 'Booking updated successfully',
                'status' => 200,
                'data' => $booking,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in updateBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to update booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }

    /**
     * Delete a booking.
     *
     * @param Booking $booking The booking to delete
     * @return array Response containing status and message
     */
    public function deleteBooking(Booking $booking)
    {
        try {
            // Delete the booking
            $booking->delete();

            // Return success response
            return [
                'message' => 'Booking deleted successfully',
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in deleteBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to delete booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }

    /**
     * Accept a booking.
     *
     * @param Booking $booking The booking to accept
     * @return array Response containing status, message, and data
     */
    public function acceptedBooking(Booking $booking)
    {
        try {
            // Check if the booking is already accepted
            if ($booking->status === 'accepted') {
                return [
                    'message' => 'Booking is already accepted',
                    'status' => 400,
                ];
            }

            // Update the booking status to "accepted"
            $booking->update([
                'status' => 'accepted',
            ]);

            // Return success response
            return [
                'message' => 'Booking accepted successfully',
                'status' => 200,
                'data' => $booking,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in acceptedBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to accept booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }

    /**
     * Reject a booking.
     *
     * @param Booking $booking The booking to reject
     * @return array Response containing status, message, and data
     */
    public function rejectBooking(Booking $booking)
    {
        try {
            // Check if the booking is already rejected
            if ($booking->status === 'rejected') {
                return [
                    'message' => 'Booking is already rejected',
                    'status' => 400,
                ];
            }

            // Update the booking status to "rejected"
            $booking->update([
                'status' => 'rejected',
            ]);

            // Return success response
            return [
                'message' => 'Booking rejected successfully',
                'status' => 200,
                'data' => $booking,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in rejectBooking: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'Failed to reject booking: ' . $e->getMessage(),
                'status' => 500,
            ];
        }
    }
}
