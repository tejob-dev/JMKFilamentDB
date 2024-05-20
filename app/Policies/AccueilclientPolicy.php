<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilclient;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilclientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilclient can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilclients');
    }

    /**
     * Determine whether the accueilclient can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function view(User $user, Accueilclient $model)
    {
        return $user->hasPermissionTo('view accueilclients');
    }

    /**
     * Determine whether the accueilclient can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilclients');
    }

    /**
     * Determine whether the accueilclient can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function update(User $user, Accueilclient $model)
    {
        return $user->hasPermissionTo('update accueilclients');
    }

    /**
     * Determine whether the accueilclient can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function delete(User $user, Accueilclient $model)
    {
        return $user->hasPermissionTo('delete accueilclients');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilclients');
    }

    /**
     * Determine whether the accueilclient can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function restore(User $user, Accueilclient $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilclient can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclient  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilclient $model)
    {
        return false;
    }
}
