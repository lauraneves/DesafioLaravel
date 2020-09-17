<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function viewAny(User $user) //index
    {
        return true;
    }

    public function view(User $user, User $model) // show
    {
        return ($user->id == $model->id || $user->is_admin);
    }

    public function __construct()
    {
        //
    }
}
