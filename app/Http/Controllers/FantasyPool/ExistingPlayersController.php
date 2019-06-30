<?php

namespace App\Http\Controllers\FantasyPool;

use App\FantasyPool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ExistingPlayersController extends Controller
{
    /**
     * ExistingPlayersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param FantasyPool $pool
     * @return Response
     */
    public function __invoke(FantasyPool $pool)
    {
        return view('pool-players.index', [
            'pool'    => $pool,
            'players' => $pool->players->sortByDesc('score')
        ]);
    }
}
