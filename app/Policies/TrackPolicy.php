<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->role === Role::Admin;
    }

    public function update(User $user): bool
    {
        return $user->role === Role::Admin;
    }

    public function delete(User $user): bool
    {
        return $user->role === Role::Admin;
    }
}
