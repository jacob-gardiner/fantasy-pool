<?php

namespace App\Observers;

use App\Invitation;
use App\Player;
use App\User;

class UsersObserver
{
    public function created(User $user)
    {
        $invitations = Invitation::where('email', $user->email)->get();
        
        foreach ($invitations as $invitation) {
            Player::create([
                'user_id' => $user->id,
                'pool_id' => $invitation->pool_id
            ]);

            $invitation->update([
                'accepted_at' => now()
            ]);
        }
    }
}
