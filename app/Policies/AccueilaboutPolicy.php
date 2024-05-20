<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilabout;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilaboutPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilabout can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilabouts');
    }

    /**
     * Determine whether the accueilabout can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function view(User $user, Accueilabout $model)
    {
        return $user->hasPermissionTo('view accueilabouts');
    }

    /**
     * Determine whether the accueilabout can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilabouts');
    }

    /**
     * Determine whether the accueilabout can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function update(User $user, Accueilabout $model)
    {
        return $user->hasPermissionTo('update accueilabouts');
    }

    /**
     * Determine whether the accueilabout can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function delete(User $user, Accueilabout $model)
    {
        return $user->hasPermissionTo('delete accueilabouts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilabouts');
    }

    /**
     * Determine whether the accueilabout can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function restore(User $user, Accueilabout $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilabout can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilabout  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilabout $model)
    {
        return false;
    }
}
