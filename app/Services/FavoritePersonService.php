<?php

namespace App\Services;

use Exception;
use App\Models\FavoritePerson;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class FavoritePersonService
{
    public function showFavoritePerson()
    {
        try {
            $favorite_users = Auth::user()->favoritePeople()->paginate(10);

            return [
                'message' => 'All favorite users retrieved successfully.',
                'data' => $favorite_users,
                'status' => 200,
            ];
        } catch (Exception $e) {
            Log::error('Error in showFavoritePerson: ' . $e->getMessage());
            return [
                'message' => 'An error occurred while retrieving favorite users.',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    public function addToFavorite($data)
    {
        try {
            // Check if the user is trying to add themselves
            if (Auth::user()->id == $data['user_id']) {
                return [
                    'message' => 'You cannot add yourself to your favorite list.',
                    'data' => null,
                    'status' => 400,
                ];
            }

            // Check if the user is already in the favorite list
            if (FavoritePerson::where('user_id', Auth::user()->id)
                ->where('favorite_user_id', $data['user_id'])
                ->exists()) {
                return [
                    'message' => 'User is already in your favorite list.',
                    'data' => null,
                    'status' => 400,
                ];
            }

            // Add to favorite list
            $favorite = FavoritePerson::create([
                'user_id' => Auth::user()->id,
                'favorite_user_id' => $data['user_id'],
            ]);

            return [
                'message' => 'User added to your favorite list.',
                'data' => $favorite,
                'status' => 201,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in addToFavorite: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'An error occurred while adding the user to your favorite list.',
                'data' => null,
                'status' => 500,
            ];
        }
    }

    public function removeFromFavorite($favoritePerson)
    {
        try {
            // Remove from favorite list
            $favoritePerson->delete();

            return [
                'message' => 'User removed from your favorite list.',
                'data' => null,
                'status' => 200,
            ];
        } catch (Exception $e) {
            // Log the error if an exception occurs
            Log::error('Error in removeFromFavorite: ' . $e->getMessage());

            // Return an error message and status
            return [
                'message' => 'An error occurred while removing the user from your favorite list.',
                'data' => null,
                'status' => 500,
            ];
        }
    }
}
