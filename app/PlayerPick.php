<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerPick extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function houseguest()
    {
        return $this->belongsTo(Houseguest::class);
    }
}
