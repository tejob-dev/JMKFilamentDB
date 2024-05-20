<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the slide can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list slides');
    }

    /**
     * Determine whether the slide can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function view(User $user, Slide $model)
    {
        return $user->hasPermissionTo('view slides');
    }

    /**
     * Determine whether the slide can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create slides');
    }

    /**
     * Determine whether the slide can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function update(User $user, Slide $model)
    {
        return $user->hasPermissionTo('update slides');
    }

    /**
     * Determine whether the slide can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function delete(User $user, Slide $model)
    {
        return $user->hasPermissionTo('delete slides');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete slides');
    }

    /**
     * Determine whether the slide can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function restore(User $user, Slide $model)
    {
        return false;
    }

    /**
     * Determine whether the slide can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Slide  $model
     * @return mixed
     */
    public function forceDelete(User $user, Slide $model)
    {
        return false;
    }
}
