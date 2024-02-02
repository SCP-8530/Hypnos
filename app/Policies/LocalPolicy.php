<?php

namespace App\Policies;

use App\Models\Local;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class LocalPolicy
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
    public function view(User $user, Local $local): bool
    {
        return $user->admin === 1 || $user->gestionnaire === 1 || $user->prof === 1;
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
    public function update(User $user, Local $local): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Local $local): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Local $local): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Local $local): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }
}
