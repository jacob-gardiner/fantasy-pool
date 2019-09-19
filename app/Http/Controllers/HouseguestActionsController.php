<?php

namespace App\Http\Controllers;

use App\HouseguestAction;
use App\Http\Requests\HouseguestActions\HouseguestActionRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

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
     * @param HouseguestActionRequest $request
     * @return Response
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
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(HouseguestAction $houseguestAction)
    {
        $houseguestAction->delete();
        return back();
    }
}
