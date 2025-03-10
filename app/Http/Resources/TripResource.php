<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'trip_start' => $this->trip_start,
            'from' => $this->from,
            'to' => $this->to,
            'status' => $this->status,
            'seat_price' => $this->seat_price,
            'available_seats' => $this->available_seats,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
