<?php

namespace App\Policies\FantasyPool;

use App\User;
use App\GameAction;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class GameActionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the game action.
     *
     * @param User       $user
     * @param GameAction $action
     * @return mixed
     */
    public function view(User $user, GameAction $action)
    {
        return Gate::allows('owns-pool', $action->pool);
    }

    /**
     * Determine whether the user can create game actions.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the game action.
     *
     * @param User       $user
     * @param GameAction $action
     * @return mixed
     */
    public function update(User $user, GameAction $action)
    {
        return Gate::allows('owns-pool', $action->pool);
    }

    /**
     * Determine whether the user can delete the game action.
     *
     * @param User       $user
     * @param GameAction $action
     * @return mixed
     */
    public function delete(User $user, GameAction $action)
    {
        return Gate::allows('owns-pool', $action->pool);
    }
}
