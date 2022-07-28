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
            'perfectGames' => $this->perfect_games,
            'games' => new GameSmallCollection($this->games),
            // 'player1Games' => new GameSmallCollection($this->player1Games),
            // 'player2Games' => new GameSmallCollection($this->player2Games),
            // 'player3Games' => new GameSmallCollection($this->player3Games),
            // 'player4Games' => new GameSmallCollection($this->player4Games),
            'playedGames' => $this->played_games,
        ];
    }
}
