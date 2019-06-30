<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameAction extends Model
{
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pool()
    {
        return $this->belongsTo(FantasyPool::class, 'pool_id', 'id');
    }
}
