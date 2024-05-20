<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Lienfooter;
use Illuminate\Auth\Access\HandlesAuthorization;

class LienfooterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the lienfooter can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list lienfooters');
    }

    /**
     * Determine whether the lienfooter can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function view(User $user, Lienfooter $model)
    {
        return $user->hasPermissionTo('view lienfooters');
    }

    /**
     * Determine whether the lienfooter can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create lienfooters');
    }

    /**
     * Determine whether the lienfooter can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function update(User $user, Lienfooter $model)
    {
        return $user->hasPermissionTo('update lienfooters');
    }

    /**
     * Determine whether the lienfooter can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function delete(User $user, Lienfooter $model)
    {
        return $user->hasPermissionTo('delete lienfooters');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete lienfooters');
    }

    /**
     * Determine whether the lienfooter can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function restore(User $user, Lienfooter $model)
    {
        return false;
    }

    /**
     * Determine whether the lienfooter can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Lienfooter  $model
     * @return mixed
     */
    public function forceDelete(User $user, Lienfooter $model)
    {
        return false;
    }
}
