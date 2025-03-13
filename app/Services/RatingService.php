<?php

namespace App\Services;

use Exception;
use App\Models\Rating;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RatingService
{
    /**
     * Create a new rating.
     *
     * @param array $data Contains rate, review, and booking_id.
     * @return array Contains message, data (created rating), and status.
     */
    public function createRating($data)
    {
        try {
            // Create a new rating
            $rating = Rating::create([
                'rate' => $data['rate'],
                'review' => $data['review'],
                'booking_id' => $data['booking_id'],
                'user_id' => Auth::user()->id,
            ]);

            return [
                'message' => 'Rating created successfully',
                'data' => $rating,
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in createRating: ' . $e->getMessage());

            // Return an error message and status
            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ['An error occurred while creating the rating.'],
                ],
            ];
        }
    }

    /**
     * Update an existing rating.
     *
     * @param array $data Contains rate, review, and booking_id (optional).
     * @param Rating $rating The rating to be updated.
     * @return array Contains message, data (updated rating), and status.
     */
    public function updateRating($data, $rating)
    {
        try {
            // Update the rating
            $rating->update([
                'rate' => $data['rate'] ?? $rating->rate,
                'review' => $data['review'] ?? $rating->review,
                'booking_id' => $data['booking_id'] ?? $rating->booking_id,
            ]);

            return [
                'message' => 'Rating updated successfully',
                'data' => $rating,
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in updateRating: ' . $e->getMessage());

            // Return an error message and status
            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ['An error occurred while updating the rating.'],
                ],
            ];
        }
    }

    /**
     * Delete a rating.
     *
     * @param Rating $rating The rating to be deleted.
     * @return array Contains message and status.
     */
    public function deleteRating(Rating $rating)
    {
        try {
            // Delete the rating
            $rating->delete();

            return [
                'message' => 'Rating deleted successfully',
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in deleteRating: ' . $e->getMessage());

            // Return an error message and status
            return [
                'status' => 500,
                'message' => [
                    'errorDetails' => ['An error occurred while deleting the rating.'],
                ],
            ];
        }
    }
}
