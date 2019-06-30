<?php

namespace App\Http\Controllers;

use App\FantasyPool;
use App\Http\Requests\PlayerPicks\PlayerPickRequest;
use App\Player;
use App\PlayerPick;
use App\Services\FantasyPool\PlayerPickService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PlayerPickController extends Controller
{
    /**
     * @var PlayerPickService
     */
    private $pickService;

    /**
     * PlayerPickController constructor.
     * @param PlayerPickService $pickService
     */
    public function __construct(PlayerPickService $pickService)
    {
        $this->middleware('auth');
        $this->pickService = $pickService;
    }

    /**
     * @param FantasyPool $pool
     * @return Factory|View
     */
    public function index(FantasyPool $pool)
    {
        $player      = Player::currentForPool($pool->id)->first();
        $houseguests = $this->pickService->getAvailableHouseguests($player->id);

        return view('player.houseguestSelection', [
            'houseguests'         => $houseguests,
            'player'              => $player,
            'selectedHouseguests' => $player->houseguests
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PlayerPickRequest $request
     * @return Response
     */
    public function store(PlayerPickRequest $request)
    {
        /* Verify that the user doesnt have 3 players selected yet */
        if (Player::findOrFail($request->get('player_id'))->houseguests->count() >= 3) {
            return back()->with([
                'message-type' => 'danger',
                'message'      => 'You have already selected the max # of houseguests'
            ]);
        }

        if (!$this->pickService->allowSelection($request->get('player_id'), $request->get('houseguest_id'))) {
            return back()->with('message', 'Houseguest not available')->with('message-type', 'danger');
        }

        PlayerPick::create([
            'pool_id'       => $request->get('pool_id'),
            'player_id'     => $request->get('player_id'),
            'houseguest_id' => $request->get('houseguest_id'),
        ]);

        return redirect()->route('fantasy-pool.dashboard', ['pool' => $request->get('pool_id')]);
    }


}
