<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FantasyPool extends Model
{
    protected $table = 'pools';

    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function houseguests()
    {
        return $this->hasMany(Houseguest::class, 'pool_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'pool_id');
    }

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'players', 'pool_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function gameActions()
    {
        return $this->hasMany(GameAction::class, 'pool_id', 'id');
    }

    /**
     * @return bool
     */
    public function getAllowSelectionsAttribute()
    {
        return $this->selection_closed_at === null || $this->selection_closed_at > now();
    }

    /**
     * @return int
     */
    public function getScoreAttribute()
    {
        $score   = 0;
        $players = $this->players;

        foreach ($players as $player) {
            $score += $player->score;
        }

        return $score;
    }
}
