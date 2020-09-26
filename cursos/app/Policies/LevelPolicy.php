<?php

namespace App\Policies;

use App\Level;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevelPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::ROLE_SUPERADMIN)) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any levels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can view the level.
     *
     * @param  \App\User  $user
     * @param  \App\Level  $level
     * @return mixed
     */
    public function view(User $user, Level $level)
    {
        return $user->isGranted(User::ROLE_USER);
    }

    /**
     * Determine whether the user can create levels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can update the level.
     *
     * @param  \App\User  $user
     * @param  \App\Level  $level
     * @return mixed
     */
    public function update(User $user, Level $level)
    {
        return $user->isGranted(User::ROLE_ADMIN);
    }

    /**
     * Determine whether the user can delete the level.
     *
     * @param  \App\User  $user
     * @param  \App\Level  $level
     * @return mixed
     */
    public function delete(User $user, Level $level)
    {
        return $user->isGranted(User::ROLE_SUPERADMIN);
    }

    /**
     * Determine whether the user can restore the level.
     *
     * @param  \App\User  $user
     * @param  \App\Level  $level
     * @return mixed
     */
    public function restore(User $user, Level $level)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the level.
     *
     * @param  \App\User  $user
     * @param  \App\Level  $level
     * @return mixed
     */
    public function forceDelete(User $user, Level $level)
    {
        //
    }
}
