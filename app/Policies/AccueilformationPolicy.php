<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueilformation;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueilformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueilformation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueilformations');
    }

    /**
     * Determine whether the accueilformation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function view(User $user, Accueilformation $model)
    {
        return $user->hasPermissionTo('view accueilformations');
    }

    /**
     * Determine whether the accueilformation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueilformations');
    }

    /**
     * Determine whether the accueilformation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function update(User $user, Accueilformation $model)
    {
        return $user->hasPermissionTo('update accueilformations');
    }

    /**
     * Determine whether the accueilformation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function delete(User $user, Accueilformation $model)
    {
        return $user->hasPermissionTo('delete accueilformations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueilformations');
    }

    /**
     * Determine whether the accueilformation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function restore(User $user, Accueilformation $model)
    {
        return false;
    }

    /**
     * Determine whether the accueilformation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueilformation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueilformation $model)
    {
        return false;
    }
}
