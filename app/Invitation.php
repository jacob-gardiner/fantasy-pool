<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $guarded = [];

    public function pool()
    {
        return $this->belongsTo(FantasyPool::class, 'pool_id');
    }

    /**
     * @param $pool
     */
    public function setPoolAttribute($pool)
    {
        $this->pool_id = $pool->id;
    }
}
