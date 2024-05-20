<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilclientitem;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilclientitemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilclientitem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilclientitems');
    }

    /**
     * Determine whether the accueilclientitem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function view(User $user, Accueilclientitem $model)
    {
        return $user->hasPermissionTo('view accueilclientitems');
    }

    /**
     * Determine whether the accueilclientitem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilclientitems');
    }

    /**
     * Determine whether the accueilclientitem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function update(User $user, Accueilclientitem $model)
    {
        return $user->hasPermissionTo('update accueilclientitems');
    }

    /**
     * Determine whether the accueilclientitem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function delete(User $user, Accueilclientitem $model)
    {
        return $user->hasPermissionTo('delete accueilclientitems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilclientitems');
    }

    /**
     * Determine whether the accueilclientitem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function restore(User $user, Accueilclientitem $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilclientitem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilclientitem  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilclientitem $model)
    {
        return false;
    }
}
