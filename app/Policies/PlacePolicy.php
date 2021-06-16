<?php

namespace App\Policies;

use App\Models\Place;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlacePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->role === 'admin')
        {
            return true;
        }

        return false;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Place $place)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Place $place)
    {
        return false;
    }

    public function delete(User $user, Place $place)
    {
        return false;
    }

    public function restore(User $user, Place $place)
    {
        return false;
    }

    public function forceDelete(User $user, Place $place)
    {
        return false;
    }
}
