<?php

namespace App\Observers;

use App\FantasyPool;
use App\Player;

class FantasyPoolObserver
{
    /**
     * Handle the fantasy pool "created" event.
     *
     * @param FantasyPool $fantasyPool
     * @return void
     */
    public function created(FantasyPool $fantasyPool)
    {
        /* Add the current user as a player to the new pool */
        Player::create([
            'user_id' => auth()->user()->id,
            'pool_id' => $fantasyPool->id,
        ]);
    }
}
