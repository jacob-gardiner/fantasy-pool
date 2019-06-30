<?php

namespace App\Helpers;

use App\FantasyPool;

class PoolHelpers
{
    public function isPoolOwner($poolId)
    {
        return FantasyPool::findOrFail($poolId)->owner_id == auth()->user()->id;
    }
}
