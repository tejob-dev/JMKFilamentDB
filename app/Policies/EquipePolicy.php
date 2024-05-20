<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Equipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the equipe can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list equipes');
    }

    /**
     * Determine whether the equipe can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function view(User $user, Equipe $model)
    {
        return $user->hasPermissionTo('view equipes');
    }

    /**
     * Determine whether the equipe can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create equipes');
    }

    /**
     * Determine whether the equipe can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function update(User $user, Equipe $model)
    {
        return $user->hasPermissionTo('update equipes');
    }

    /**
     * Determine whether the equipe can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function delete(User $user, Equipe $model)
    {
        return $user->hasPermissionTo('delete equipes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete equipes');
    }

    /**
     * Determine whether the equipe can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function restore(User $user, Equipe $model)
    {
        return false;
    }

    /**
     * Determine whether the equipe can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Equipe  $model
     * @return mixed
     */
    public function forceDelete(User $user, Equipe $model)
    {
        return false;
    }
}
