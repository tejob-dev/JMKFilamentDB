<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Actualite;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActualitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the actualite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list actualites');
    }

    /**
     * Determine whether the actualite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function view(User $user, Actualite $model)
    {
        return $user->hasPermissionTo('view actualites');
    }

    /**
     * Determine whether the actualite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create actualites');
    }

    /**
     * Determine whether the actualite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function update(User $user, Actualite $model)
    {
        return $user->hasPermissionTo('update actualites');
    }

    /**
     * Determine whether the actualite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function delete(User $user, Actualite $model)
    {
        return $user->hasPermissionTo('delete actualites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete actualites');
    }

    /**
     * Determine whether the actualite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function restore(User $user, Actualite $model)
    {
        return false;
    }

    /**
     * Determine whether the actualite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Actualite  $model
     * @return mixed
     */
    public function forceDelete(User $user, Actualite $model)
    {
        return false;
    }
}
