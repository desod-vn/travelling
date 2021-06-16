<?php

namespace App\Policies;

use App\Models\Box;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoxPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Box $box)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Box $box)
    {
        return $user->id === $box->user_id;
    }

    public function delete(User $user, Box $box)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, Box $box)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Box $box)
    {
        return $user->role === 'admin';
    }
}
