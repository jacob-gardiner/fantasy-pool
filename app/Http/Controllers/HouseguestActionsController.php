<?php

namespace App\Http\Controllers;

use App\HouseguestAction;
use App\Http\Requests\HouseguestActions\HouseguestActionRequest;
use Illuminate\Http\Request;

class HouseguestActionsController extends Controller
{
    /**
     * HouseguestActionsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseguestActionRequest $request)
    {
        HouseguestAction::create([
            'houseguest_id' => $request->get('houseguest_id'),
            'action_id'     => $request->get('action_id'),
            'note'          => $request->get('note')
        ]);

        return back();
    }

    /**
     * @param HouseguestAction $houseguestAction
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(HouseguestAction $houseguestAction)
    {
        $houseguestAction->delete();
        return back();
    }
}
