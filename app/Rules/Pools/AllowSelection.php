<?php

namespace App\Rules\Pools;

use App\FantasyPool;
use Illuminate\Contracts\Validation\Rule;

class AllowSelection implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pool = FantasyPool::findOrFail($value);
        return $pool->allow_selections;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This pool no longer accepts selections.';
    }
}
