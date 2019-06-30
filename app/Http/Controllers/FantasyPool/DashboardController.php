<?php

namespace App\Http\Controllers\FantasyPool;

use App\FantasyPool;
use App\Helpers\PoolHelpers;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @var PoolHelpers
     */
    private $poolHelpers;

    /**
     * DashboardController constructor.
     * @param PoolHelpers $poolHelpers
     */
    public function __construct(PoolHelpers $poolHelpers)
    {
        $this->middleware('auth');
        $this->poolHelpers = $poolHelpers;
    }
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param FantasyPool              $pool
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, FantasyPool $pool)
    {
        $currentPlayer = Player::currentForPool($pool->id)->firstOrFail();

        return view('fantasy-pool.dashboard', [
            'houseguests' => $pool->houseguests->sortByDesc('score')->take(3),
            'pool'        => $pool,
            'gameActions' => $pool->gameActions,
            'players'     => $pool->players->sortByDesc('score')->take(3),
            'isOwner'     => $this->poolHelpers->isPoolOwner($pool->id),
            'playerPicks' => $currentPlayer->houseguests,
            'player'      => $currentPlayer,
        ]);
    }
}
