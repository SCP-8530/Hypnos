<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /** @author Philippe Bertrand et Guillaume Paoli
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Enseignant' => 'App\Policies\EnseignantPolicy',
        'App\Models\Local' => 'App\Policies\LocalPolicy',
        'App\Models\Horaires' => 'App\Policies\HorairePolicy',
        'App\Models\GroupeCours' => 'App\Policies\GroupeCoursPolicy',
        'App\Models\Cheminements' => 'App\Policies\CheminementsPolicy',
        'App\Models\Cours' => 'App\Policies\CoursPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('admin',function (User $user){
           return $user->admin;
        });
        Gate::define('prof',function (User $user){
            return $user->prof;
        });
        Gate::define('gestionnaire',function (User $user){
            return $user->gestionnaire;
        });
    }
}
