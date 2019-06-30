<?php

namespace App\Http\Controllers;

use App\FantasyPool;
use App\Http\Requests\Invitations\InvitationRequest;
use App\Invitation;
use App\Player;
use App\User;

class InvitationsController extends Controller
{
    /**
     * InvitationsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param InvitationRequest $request
     * @param FantasyPool       $pool
     * @return void
     */
    public function __invoke(InvitationRequest $request, FantasyPool $pool)
    {
        $user = User::whereEmail($request->get('email'))->first();

        /* If the user doesnt already exist then send the invitation email */
        if (!$user) {
            Invitation::updateOrCreate([
                'email'   => $request->get('email'),
                'pool_id' => $pool->id
            ], [
                'email' => $request->get('email'),
                'pool'  => $pool
            ]);

            return redirect()->back()->with('message', 'Invitation sent to ' . $request->get('email'));
        }

        $player = Player::where('user_id', $user->id)->wherePool($pool->id)->first();

        /* If the user is not already in the pool then add them */
        if(!$player){
            Player::create([
                'user' => $user,
                'pool' => $pool
            ]);
            return redirect()->back()->with('message', 'User added to pool ' . $request->get('email'));
        }

        return redirect()->back()->with('message', $request->get('email') . ' is already in the pool');
    }
}
