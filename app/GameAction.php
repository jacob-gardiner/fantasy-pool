<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameAction extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pool()
    {
        return $this->belongsTo(FantasyPool::class, 'pool_id', 'id');
    }
}
