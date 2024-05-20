<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilmanager;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilmanagerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilmanager can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilmanagers');
    }

    /**
     * Determine whether the accueilmanager can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function view(User $user, Accueilmanager $model)
    {
        return $user->hasPermissionTo('view accueilmanagers');
    }

    /**
     * Determine whether the accueilmanager can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilmanagers');
    }

    /**
     * Determine whether the accueilmanager can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function update(User $user, Accueilmanager $model)
    {
        return $user->hasPermissionTo('update accueilmanagers');
    }

    /**
     * Determine whether the accueilmanager can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function delete(User $user, Accueilmanager $model)
    {
        return $user->hasPermissionTo('delete accueilmanagers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilmanagers');
    }

    /**
     * Determine whether the accueilmanager can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function restore(User $user, Accueilmanager $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilmanager can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanager  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilmanager $model)
    {
        return false;
    }
}
