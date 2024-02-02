<?php

namespace App\Policies;

use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class EnseignantPolicy
{
    /** @author Philippe Bertrand
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Enseignant $enseignant): bool
    {
        return $user->id === $enseignant->user_id || $user->admin === 1 || $user->gestionnaire === 1;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->admin === 1 || $user->gestionnaire === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Enseignant $enseignant): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Enseignant $enseignant): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Enseignant $enseignant): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Enseignant $enseignant): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }
}
