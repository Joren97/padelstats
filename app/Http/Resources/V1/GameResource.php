<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'team1' => $this->team1,
            'team2' => $this->team2,
            'team1Score' => $this->team1Score,
            'team2Score' => $this->team2Score,
            'game_datetime' => $this->game_datetime,
            'winningTeam' => $this->team1Score > $this->team2Score ? $this->team1 : $this->team2,
        ];
    }
}
