<?php

namespace App\Http\Controllers\Admin;

use App\FantasyPool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddHouseguestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param FantasyPool              $pool
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, FantasyPool $pool)
    {
        return view('houseguest.create', [
            'pool'        => $pool,
            'houseguests' => $pool->houseguests,
        ]);
    }
}
