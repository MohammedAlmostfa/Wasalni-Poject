<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritePerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'favorite_user_id',
    ];

    /**
     * Get the user who added the favorite person.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the favorite user.
     */
    public function favoriteUser()
    {
        return $this->belongsTo(User::class, 'favorite_user_id');
    }
}
