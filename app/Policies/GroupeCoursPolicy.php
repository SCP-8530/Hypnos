<?php

namespace App\Policies;

use App\Models\Enseignant;
use App\Models\GroupeCours;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class GroupeCoursPolicy
{
    /** @author Guillaume Paoli
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GroupeCours $groupeCours): bool
    {
        return Gate::any(['admin','gestionnaire']);
        // Accepter un enseignant qui a un groupe_cours de le consulter (refuser par Guillaume :( )
        // return $groupeCours->proprioEnseignant->contains('id', $user->enseignant->id);
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
    public function update(User $user, GroupeCours $groupeCours): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GroupeCours $groupeCours): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GroupeCours $groupeCours): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GroupeCours $groupeCours): bool
    {
        return Gate::any(['admin','gestionnaire']);
    }
}
