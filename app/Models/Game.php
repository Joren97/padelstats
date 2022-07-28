<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_1_id',
        'player_2_id',
        'player_3_id',
        'player_4_id',
        'score_team_1',
        'score_team_2',
        'game_datetime'
    ];

    public function player_1()
    {
        return $this->belongsTo(Player::class , 'player_1_id', 'id');
    }

    public function player_2()
    {
        return $this->belongsTo(Player::class , 'player_2_id', 'id');
    }

    public function player_3()
    {
        return $this->belongsTo(Player::class , 'player_3_id', 'id');
    }

    public function player_4()
    {
        return $this->belongsTo(Player::class , 'player_4_id', 'id');
    }

    public function getTeam1Attribute()
    {
        return [$this->player_1, $this->player_2];
    }

    public function getTeam2Attribute()
    {
        return [$this->player_3, $this->player_4];
    }
}
