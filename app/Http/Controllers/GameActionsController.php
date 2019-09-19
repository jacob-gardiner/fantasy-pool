<?php

namespace App\Http\Controllers;

use App\FantasyPool;
use App\GameAction;
use App\Http\Requests\GameActions\GameActionRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\UnauthorizedException;

class GameActionsController extends Controller
{
    /**
     * GameActionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(GameAction::class,'action');
    }

    /**
     * Display a listing of the resource.
     *
     * @param FantasyPool $pool
     * @return Response
     * @throws Exception
     */
    public function index(FantasyPool $pool)
    {
      return view('pool-actions.index', [
            'actions' => $pool->gameActions,
            'poolId'  => $pool->id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FantasyPool $pool
     * @return Response
     * @throws Exception
     */
    public function create(FantasyPool $pool)
    {
        if (Gate::denies('owns-pool', $pool)) {
            throw new UnauthorizedException('You are not the owner of this pool');
        }

        return view('pool-actions.create', ['pool_id' => $pool->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GameActionRequest $request
     * @param FantasyPool       $pool
     * @return Response
     * @throws Exception
     */
    public function store(GameActionRequest $request, FantasyPool $pool)
    {
        GameAction::create([
            'name'    => $request->get('name'),
            'score'   => $request->get('score'),
            'pool_id' => $pool->id,
        ]);

        return redirect()->route('pool.game-actions', [
            'pool' => $pool->id
        ])->with('message', 'Action Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param GameAction $action
     * @return Response
     */
    public function show(GameAction $action)
    {
        return view('pool-actions.show', [
            'action' => $action
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FantasyPool $pool
     * @param GameAction  $action
     * @return Response
     * @throws Exception
     */
    public function edit(FantasyPool $pool, GameAction $action)
    {
        return view('pool-actions.edit', [
            'action' => $action,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GameActionRequest $request
     * @param FantasyPool       $pool
     * @param GameAction        $action
     * @return void
     * @throws Exception
     */
    public function update(GameActionRequest $request, FantasyPool $pool, GameAction $action)
    {
        $action->update([
            'name'  => $request->get('name'),
            'score' => $request->get('score')
        ]);
        return redirect()->route('pool.game-actions', [
            'pool' => $pool->id
        ])->with('message', 'Action Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GameAction $action
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(GameAction $action)
    {
        $action->delete();

        return redirect()->route('pool.game-actions', [
            'pool' => $action->pool->id
        ])->with([
            'message' => 'Action Deleted',
            'type'    => 'danger',
        ]);
    }
}
