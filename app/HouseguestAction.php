<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HouseguestAction extends Model
{
    use SoftDeletes;

    protected $table = 'houseguest_actions';

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function action()
    {
        return $this->hasOne(GameAction::class, 'id', 'action_id');
    }

    /**
     * @return mixed
     */
    public function getHumanDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
