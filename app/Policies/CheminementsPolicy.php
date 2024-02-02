<?php

namespace App\Policies;

use App\Models\Cheminements;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class CheminementsPolicy
{
    /** @author Philippe Bertrand
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cheminements $cheminements): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cheminements $cheminements): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cheminements $cheminements): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cheminements $cheminements): bool
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cheminements $cheminements): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }
}
