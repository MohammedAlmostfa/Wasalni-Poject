<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'favorited_user' => [
                'id' => $this->favoriteUser->id,
                'name' => $this->favoriteUser->profile->first_name,
                'email' => $this->favoriteUser->email,
            ],
            'added_on' => $this->created_at->format('Y-m-d'),
        ];
    }
}
