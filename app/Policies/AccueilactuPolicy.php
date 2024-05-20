<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilactu;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilactuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilactu can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilactus');
    }

    /**
     * Determine whether the accueilactu can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function view(User $user, Accueilactu $model)
    {
        return $user->hasPermissionTo('view accueilactus');
    }

    /**
     * Determine whether the accueilactu can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilactus');
    }

    /**
     * Determine whether the accueilactu can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function update(User $user, Accueilactu $model)
    {
        return $user->hasPermissionTo('update accueilactus');
    }

    /**
     * Determine whether the accueilactu can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function delete(User $user, Accueilactu $model)
    {
        return $user->hasPermissionTo('delete accueilactus');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilactus');
    }

    /**
     * Determine whether the accueilactu can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function restore(User $user, Accueilactu $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilactu can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilactu  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilactu $model)
    {
        return false;
    }
}
