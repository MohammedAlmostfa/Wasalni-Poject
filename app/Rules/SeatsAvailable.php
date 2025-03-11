<?php
namespace App\Rules;

use App\Models\Trip;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class SeatsAvailable implements Rule
{
    protected $tripId;

    public function __construct($tripId)
    {
        $this->tripId = $tripId;
    }

    public function passes($attribute, $value)
    {
        $availableSeats =Trip::find($this->tripId)->available_seats;

        return $value <= $availableSeats;
    }

    public function message()
    {
        return 'The number of seats requested exceeds the available seats.';
    }
}
