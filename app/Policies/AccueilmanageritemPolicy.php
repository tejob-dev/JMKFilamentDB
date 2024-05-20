<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilmanageritem;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilmanageritemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilmanageritem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilmanageritems');
    }

    /**
     * Determine whether the accueilmanageritem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function view(User $user, Accueilmanageritem $model)
    {
        return $user->hasPermissionTo('view accueilmanageritems');
    }

    /**
     * Determine whether the accueilmanageritem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilmanageritems');
    }

    /**
     * Determine whether the accueilmanageritem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function update(User $user, Accueilmanageritem $model)
    {
        return $user->hasPermissionTo('update accueilmanageritems');
    }

    /**
     * Determine whether the accueilmanageritem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function delete(User $user, Accueilmanageritem $model)
    {
        return $user->hasPermissionTo('delete accueilmanageritems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilmanageritems');
    }

    /**
     * Determine whether the accueilmanageritem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function restore(User $user, Accueilmanageritem $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilmanageritem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilmanageritem  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilmanageritem $model)
    {
        return false;
    }
}
