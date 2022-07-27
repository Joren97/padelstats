<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'wonGames' => $this->won_games,
            'winPercentage' => $this->win_percentage,
            'lostGames' => $this->lost_games,
            'losePercentage' => $this->lose_percentage,
            'games' => new GameCollection($this->games),
            'perfectGames' => $this->perfect_games,
        ];
    }
}
