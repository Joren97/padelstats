<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
    ];

    public function player1Games()
    {
        return $this->hasMany(Game::class , 'player_1_id');
    }

    public function player2Games()
    {
        return $this->hasMany(Game::class , 'player_2_id');
    }

    public function player3Games()
    {
        return $this->hasMany(Game::class , 'player_3_id');
    }

    public function player4Games()
    {
        return $this->hasMany(Game::class , 'player_4_id');
    }

    public function getGamesAttribute()
    {
        return array_merge($this->player1Games()->get()->toArray(),
            $this->player2Games()->get()->toArray(),
            $this->player3Games()->get()->toArray(),
            $this->player4Games()->get()->toArray());
    }

    public function getTeam1GamesAttribute()
    {
        return array_merge($this->player1Games()->get()->toArray(),
            $this->player2Games()->get()->toArray());
    }

    public function getTeam2GamesAttribute()
    {
        return array_merge($this->player3Games()->get()->toArray(),
            $this->player4Games()->get()->toArray());
    }

    public function getPlayedGamesAttribute()
    {
        return count($this->games);
    }

    public function getWonGamesAttribute()
    {
        return $this->player1Games()->whereRaw('score_team_1 > score_team_2')->count()
            + $this->player2Games()->whereRaw('score_team_1 > score_team_2')->count()
            + $this->player3Games()->whereRaw('score_team_1 < score_team_2')->count()
            + $this->player4Games()->whereRaw('score_team_1 < score_team_2')->count();
    }
    public function getWinPercentageAttribute()
    {
        return $this->played_games == 0 ? 0 : round($this->won_games / $this->played_games * 100, 2);
    }
    public function getLostGamesAttribute()
    {
        return $this->played_games - $this->won_games;
    }
    public function getLosePercentageAttribute()
    {
        return $this->played_games == 0 ? 0 : round($this->lost_games / $this->played_games * 100, 2);
    }
    public function getPerfectGamesAttribute()
    {
        return $this->player1Games()->whereIn('score_team_1', [6, 9])->where('score_team_2', '=', 0)->count()
            + $this->player2Games()->whereIn('score_team_1', [6, 9])->where('score_team_2', '=', 0)->count()
            + $this->player3Games()->whereIn('score_team_2', [6, 9])->where('score_team_1', '=', 0)->count()
            + $this->player4Games()->whereIn('score_team_2', [6, 9])->where('score_team_1', '=', 0)->count();
    }
}
