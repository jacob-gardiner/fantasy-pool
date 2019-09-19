<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Houseguest extends Model
{
    protected $guarded = [];

    protected $appends = ['score'];

    /**
     * @return BelongsTo
     */
    public function pool()
    {
        return $this->belongsTo(FantasyPool::class, 'pool_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function actions()
    {
        return $this->hasMany(HouseguestAction::class, 'houseguest_id', 'id');
    }

    /**
     * @return HasManyThrough
     */
    public function players()
    {
        return $this->hasManyThrough(Player::class, PlayerPick::class, 'houseguest_id', 'id', 'id');
    }

    /**
     * @return int
     */
    public function getScoreAttribute()
    {
        $score = 0;
        foreach ($this->actions as $action) {
            $x = $action->action;
            $score += $x->score;
        }

        return $score;
    }

    public function scopeWherePool($query, $poolId)
    {
        return $query->where('pool_id', $poolId);
    }
}
