<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Notification $notification)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Notification $notification)
    {
        return true;
    }

    public function delete(User $user, Notification $notification)
    {
        return true;
    }

    public function restore(User $user, Notification $notification)
    {
        return true;
    }

    public function forceDelete(User $user, Notification $notification)
    {
        return true;
    }
}
