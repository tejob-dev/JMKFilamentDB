<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilservice;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilservicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilservice can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilservices');
    }

    /**
     * Determine whether the accueilservice can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function view(User $user, Accueilservice $model)
    {
        return $user->hasPermissionTo('view accueilservices');
    }

    /**
     * Determine whether the accueilservice can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilservices');
    }

    /**
     * Determine whether the accueilservice can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function update(User $user, Accueilservice $model)
    {
        return $user->hasPermissionTo('update accueilservices');
    }

    /**
     * Determine whether the accueilservice can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function delete(User $user, Accueilservice $model)
    {
        return $user->hasPermissionTo('delete accueilservices');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilservices');
    }

    /**
     * Determine whether the accueilservice can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function restore(User $user, Accueilservice $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilservice can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilservice  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilservice $model)
    {
        return false;
    }
}
