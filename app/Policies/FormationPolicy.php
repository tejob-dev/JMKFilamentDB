<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Formation;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the formation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list formations');
    }

    /**
     * Determine whether the formation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function view(User $user, Formation $model)
    {
        return $user->hasPermissionTo('view formations');
    }

    /**
     * Determine whether the formation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create formations');
    }

    /**
     * Determine whether the formation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function update(User $user, Formation $model)
    {
        return $user->hasPermissionTo('update formations');
    }

    /**
     * Determine whether the formation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function delete(User $user, Formation $model)
    {
        return $user->hasPermissionTo('delete formations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete formations');
    }

    /**
     * Determine whether the formation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function restore(User $user, Formation $model)
    {
        return false;
    }

    /**
     * Determine whether the formation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Formation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Formation $model)
    {
        return false;
    }
}
