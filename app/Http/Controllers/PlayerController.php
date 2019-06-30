<?php

namespace App\Http\Controllers;

use App\Helpers\PoolHelpers;
use App\Player;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    private $poolHelpers;

    /**
     * PlayerController constructor.
     * @param PoolHelpers $poolHelpers
     */
    public function __construct(PoolHelpers $poolHelpers)
    {
        $this->middleware('auth');

        $this->poolHelpers = $poolHelpers;
    }

    /**
     * Display the specified resource.
     *
     * @param Player $player
     * @return Response
     */
    public function show(Player $player)
    {
        return view('player.show', [
            'player'      => $player,
            'houseguests' => $player->houseguests,
            'isOwner'     => $this->poolHelpers->isPoolOwner($player->pool->id),
        ]);
    }
}
