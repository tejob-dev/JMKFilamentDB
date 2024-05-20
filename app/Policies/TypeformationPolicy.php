<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Typeformation;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the typeformation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list typeformations');
    }

    /**
     * Determine whether the typeformation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function view(User $user, Typeformation $model)
    {
        return $user->hasPermissionTo('view typeformations');
    }

    /**
     * Determine whether the typeformation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create typeformations');
    }

    /**
     * Determine whether the typeformation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function update(User $user, Typeformation $model)
    {
        return $user->hasPermissionTo('update typeformations');
    }

    /**
     * Determine whether the typeformation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function delete(User $user, Typeformation $model)
    {
        return $user->hasPermissionTo('delete typeformations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete typeformations');
    }

    /**
     * Determine whether the typeformation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function restore(User $user, Typeformation $model)
    {
        return false;
    }

    /**
     * Determine whether the typeformation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Typeformation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Typeformation $model)
    {
        return false;
    }
}
