<?php

namespace App\Services;

use Exception;
use App\Models\Trip;
use App\Models\Rating;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RatingService
{
    public function createRating($data)
    {
        try {
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
            Log::error('Error in createRating: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while creating the rating',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    public function updateRating($data, $rating)
    {
        try {
            $rating->update([
                'rate' => $data['rate'] ?? $rating->rate,
                'review' => $data['review'] ?? $rating->review,
                'booking_id' => $data['booking_id'] ?? $rating->booking_id,

            ]);
            return [
                'message' => 'Rating updated successfully',
                'data' => $rating,
                'status' => 200, // يجب أن يكون 200 وليس 500
            ];
        } catch (Exception $e) {
            Log::error('Error in updateRating: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while updating the rating',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    public function deleteRating(Rating $rating)
    {
        try {
            $rating->delete();
            return [
                'message' => 'Rating deleted successfully',
                'data' => $rating,
                'status' => 200, // يجب أن يكون 200 وليس 500
            ];
        } catch (Exception $e) {
            Log::error('Error in deleteRating: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while deleting the rating',
                'data' => null,
                'status' => 500,
            ];
        }
    }
}
