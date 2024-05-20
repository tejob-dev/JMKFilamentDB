<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilserviceitem;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilserviceitemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilserviceitem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilserviceitems');
    }

    /**
     * Determine whether the accueilserviceitem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function view(User $user, Accueilserviceitem $model)
    {
        return $user->hasPermissionTo('view accueilserviceitems');
    }

    /**
     * Determine whether the accueilserviceitem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilserviceitems');
    }

    /**
     * Determine whether the accueilserviceitem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function update(User $user, Accueilserviceitem $model)
    {
        return $user->hasPermissionTo('update accueilserviceitems');
    }

    /**
     * Determine whether the accueilserviceitem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function delete(User $user, Accueilserviceitem $model)
    {
        return $user->hasPermissionTo('delete accueilserviceitems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilserviceitems');
    }

    /**
     * Determine whether the accueilserviceitem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function restore(User $user, Accueilserviceitem $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilserviceitem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilserviceitem  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilserviceitem $model)
    {
        return false;
    }
}
