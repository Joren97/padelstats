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
            'team1Score' => $this->score_team_1,
            'team2Score' => $this->score_team_2,
            'game_datetime' => $this->game_datetime,
            'winningTeam' => $this->score_team_1 > $this->score_team_2 ? $this->team1 : $this->team2,
        ];
    }
}
