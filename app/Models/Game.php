<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function players(){
        return $this->belongsToMany(Player::class ,'game_player');
    }

    public function getTeam1Attribute(){
        return $this->players()->where('team_id', 1)->get();
    }

    public function getTeam2Attribute(){
        return $this->players()->where('team_id', 2)->get();
    }

    public function getTeam1ScoreAttribute(){
        return $this->players()->where('team_id', 1)->max('score');
    }

    public function getTeam2ScoreAttribute(){
        return $this->players()->where('team_id', 2)->max('score');
    }
}
