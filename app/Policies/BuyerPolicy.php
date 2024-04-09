<?php

namespace App\Policies;

use App\Models\Buyer;
use App\Models\User;
use App\Traits\AdminActions;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BuyerPolicy
{
    use HandlesAuthorization, AdminActions;
    public function view(User $user, Buyer $buyer)
    {
        return $user->id === $buyer->id;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function purchase(User $user, Buyer $buyer)
    {
        return $user->id === $buyer->id;
    }


}
