<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Accueiltemoin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccueiltemoinPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the accueiltemoin can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list accueiltemoins');
    }

    /**
     * Determine whether the accueiltemoin can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function view(User $user, Accueiltemoin $model)
    {
        return $user->hasPermissionTo('view accueiltemoins');
    }

    /**
     * Determine whether the accueiltemoin can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create accueiltemoins');
    }

    /**
     * Determine whether the accueiltemoin can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function update(User $user, Accueiltemoin $model)
    {
        return $user->hasPermissionTo('update accueiltemoins');
    }

    /**
     * Determine whether the accueiltemoin can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function delete(User $user, Accueiltemoin $model)
    {
        return $user->hasPermissionTo('delete accueiltemoins');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete accueiltemoins');
    }

    /**
     * Determine whether the accueiltemoin can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function restore(User $user, Accueiltemoin $model)
    {
        return false;
    }

    /**
     * Determine whether the accueiltemoin can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Accueiltemoin  $model
     * @return mixed
     */
    public function forceDelete(User $user, Accueiltemoin $model)
    {
        return false;
    }
}
