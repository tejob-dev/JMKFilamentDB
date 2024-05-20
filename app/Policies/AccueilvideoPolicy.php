<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilvideo;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilvideoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilvideo can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilvideos');
    }

    /**
     * Determine whether the accueilvideo can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function view(User $user, Accueilvideo $model)
    {
        return $user->hasPermissionTo('view accueilvideos');
    }

    /**
     * Determine whether the accueilvideo can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilvideos');
    }

    /**
     * Determine whether the accueilvideo can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function update(User $user, Accueilvideo $model)
    {
        return $user->hasPermissionTo('update accueilvideos');
    }

    /**
     * Determine whether the accueilvideo can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function delete(User $user, Accueilvideo $model)
    {
        return $user->hasPermissionTo('delete accueilvideos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilvideos');
    }

    /**
     * Determine whether the accueilvideo can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function restore(User $user, Accueilvideo $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilvideo can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilvideo  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilvideo $model)
    {
        return false;
    }
}
