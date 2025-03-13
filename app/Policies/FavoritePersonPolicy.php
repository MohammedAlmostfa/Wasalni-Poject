<?php

namespace App\Policies;

use App\Models\FavoritePerson;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FavoritePersonPolicy
{
    /**
     * Determine if the user can add a favorite person.
     */
    public function addfavorite(User $user, $favoriteUser_id)
    {
        if($user->id =!$favoriteUser_id) {
            return Response::deny(' You cannot add yourself to your favorite list.');
        } else {
            return true;
        }
    }

    /**
     * Determine if the user can remove a favorite person.
     */
    public function delete(User $user, FavoritePerson $favoritePerson)
    {
        return $user->id == $favoritePerson->user_id;
    }
}
