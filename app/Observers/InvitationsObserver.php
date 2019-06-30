<?php

namespace App\Observers;

use App\Invitation;
use App\Mail\PoolInvite;
use Illuminate\Support\Facades\Mail;

class InvitationsObserver
{
    public function creating(Invitation $invitation)
    {
        Mail::to($invitation->email)->send(new PoolInvite($invitation));
    }
}
