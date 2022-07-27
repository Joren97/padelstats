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

    public function games(){
        return $this->belongsToMany(Game::class ,'game_player');
    }

    public function getPlayedGamesAttribute(){
        return $this->games()->where('score', '!=', NULL)->count();
    }

    public function getWonGamesAttribute(){
        return $this->games()->where('score', '!=', NULL)->whereIn('score', [6,9])->count();
    }

    public function getWinPercentageAttribute(){
        return $this->played_games == 0 ? 0 : round($this->won_games / $this->played_games * 100, 2);
    }

    public function getLostGamesAttribute(){
        return $this->games()->where('score', '!=', NULL)->whereNotIn('score', [6,9])->count();
    }

    public function getLosePercentageAttribute(){
        return $this->played_games == 0 ? 0 : round($this->lost_games / $this->played_games * 100, 2);
    }

    public function getPerfectGamesAttribute(){
        return "TODO";
    }
}
