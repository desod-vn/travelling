<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'admin';
    }

    public function view(User $user)
    {
        return true;
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->role === 'admin';
    }

    public function restore(User $user, User $model)
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, User $model)
    {
        return $user->role === 'admin';
    }
}
