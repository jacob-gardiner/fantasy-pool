<?php

namespace App\Services\FantasyPool;

use App\Houseguest;
use App\Player;
use App\PlayerPick;
use Illuminate\Support\Collection;

class PlayerPickService
{
    /**
     * Get all the ID's of houseguests that would result in collisions with other players
     *
     * @param $player
     * @return Collection
     */
    public function getCollisions($player)
    {
        $collisions       = collect();
        $playerSelections = PlayerPick::where('pool_id', $player->pool->id)->get()->groupBy('player_id');

        /* If the player doesnt currently have 2 picks then there is no chance of collision */
        if (count($player->houseguests) !== 2) {
            return $collisions;
        }

        foreach ($playerSelections as $selections) {
            $houseguests = $player->houseguests()->pluck('houseguest_id');

            if ($selections->pluck('houseguest_id')->count() !== 3) {
                continue;
            }

            $collisionValues = $selections->pluck('houseguest_id')->values()->diff($houseguests);

            /*  If the two players selections are off by 1 then remove the remaining houseguest
                from the available list so they dont end up with the same selections */
            (count($collisionValues) === 1) ? $collisions->push($collisionValues) : null;
        }

        return $collisions->flatten();
    }

    /**
     * @param $playerId
     * @return mixed
     */
    public function getAvailableHouseguests($playerId)
    {
        $player     = Player::findOrFail($playerId);
        $collisions = $this->getCollisions($player);

        /* Filter out houseguests that would result in collisions */
        return Houseguest::wherePool($player->pool_id)->get()->filter(function ($item) use ($player) {
            return !$player->houseguests->contains($item);
        })->filter(function ($item) use ($player, $collisions) {
            return !$collisions->contains($item->id);
        });
    }

    /**
     * Check if the provided player is allowed to select the provided houseguest
     *
     * @param $playerId
     * @param $houseguestId
     * @return mixed
     */
    public function allowSelection($playerId, $houseguestId)
    {
        return $this->getAvailableHouseguests($playerId)->pluck('id')->contains($houseguestId);
    }
}
