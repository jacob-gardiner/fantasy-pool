<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    protected $table = 'players';

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function pool()
    {
        return $this->belongsTo(FantasyPool::class, 'pool_id');
    }

    /**
     * @return BelongsToMany
     */
    public function houseguests()
    {
        return $this->belongsToMany(Houseguest::class, 'player_picks', 'player_id', 'houseguest_id');
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->user->name;
    }

    /**
     * @return mixed
     */
    public function getScoreAttribute()
    {
        return $this->houseguests->sum('score');
    }

    /**
     * @param $pool
     */
    public function setPoolAttribute($pool)
    {
        $this->pool_id = $pool->id;
    }

    /**
     * @param $user
     */
    public function setUserAttribute($user)
    {
        $this->user_id = $user->id;
    }

    /**
     * @param $query
     */
    public function scopeCurrentUser($query)
    {
        $query->where('user_id', auth()->user()->id);
    }

    /**
     * @param $query
     * @param $poolId
     */
    public function scopeWherePool($query, $poolId)
    {
        $query->where('pool_id', $poolId);
    }

    /**
     * @param $query
     * @param $poolId
     * @return mixed
     */
    public function scopeCurrentForPool($query, $poolId)
    {
        return $query->currentUser()->wherePool($poolId);
    }
}
