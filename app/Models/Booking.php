<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        "trip_id",
        "status",
        "seats_number",
        "resouReason_for_rejection",
        "user_id",
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
