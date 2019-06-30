<?php

namespace App\Http\Controllers\FantasyPool;

use App\FantasyPool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ExistingHouseguestsController extends Controller
{
    /**
     * ExistingHouseguestsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request, FantasyPool $pool)
    {
        return view('pool-houseguests.index', [
            'pool'        => $pool,
            'houseguests' => $pool->houseguests->sortByDesc('score')
        ]);
    }
}
