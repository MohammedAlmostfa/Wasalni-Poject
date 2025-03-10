<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'trip_start',
        'from',
        'to',
        'status',
        'seat_price',
        'available_seats',
        'user_id',
    ];


    /**
     * Define a relationship with the City model for the "from" city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cityFrom()
    {
        return $this->belongsTo(City::class, 'from');
    }

    /**
     * Define a relationship with the City model for the "to" city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cityTo()
    {
        return $this->belongsTo(City::class, 'to');
    }
}
