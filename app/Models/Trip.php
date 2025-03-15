<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }


    public function scopeFilterby($model, $filteringData)
    {
        if (isset($filteringData['trip_start'])) {
            $model->where('trip_start', '>', $filteringData['trip_start']);
        }
        if (isset($filteringData['from'])) {
            $model->where('from', $filteringData['from']);
        }
        if (isset($filteringData['to'])) {
            $model->where('to', $filteringData['to']);
        }
        if (isset($filteringData['status'])) {
            $model->where('status', $filteringData['status']);
        }
        if (isset($filteringData['seat_price'])) {
            $model->where('seat_price', '<=', $filteringData['seat_price']);
        }
        if (isset($filteringData['available_seats'])) {
            $model->where('available_seats', '>=', $filteringData['available_seats']);
        }

        return $model;
    }
}
