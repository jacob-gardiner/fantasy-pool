<?php

namespace App\Http\Controllers;

use App\FantasyPool;
use App\GameAction;
use App\Http\Requests\GameActions\GameActionRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class GameActionsController extends Controller
{
    /**
     * GameActionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        if (Gate::denies('owns-pool', $pool)) {
            throw new Exception('Not authorized');
        }

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
            throw new Exception('Not authorized');
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
        if (Gate::denies('owns-pool', $pool)) {
            throw new Exception('Not authorized');
        }

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
     * @param GameAction $poolAction
     * @return Response
     * @throws Exception
     */
    public function show(GameAction $poolAction)
    {
        if (Gate::denies('owns-pool', $poolAction->pool)) {
            throw new Exception('Not authorized');
        }

        return view('pool-actions.show', [
            'action' => $poolAction
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
        if (Gate::denies('owns-pool', $pool)) {
            throw new Exception('Not authorized');
        }

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
        if (Gate::denies('owns-pool', $pool)) {
            throw new Exception('Not authorized');
        }

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
     * @param GameAction $poolAction
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(GameAction $poolAction)
    {
        $poolAction->delete();

        return back()->with([
            'message' => 'Action Deleted',
            'type'    => 'danger',
        ]);
    }
}
