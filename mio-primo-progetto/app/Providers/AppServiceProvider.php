<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. Aggiungi queste importazioni:
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Project;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. Definisci qui il tuo Gate
        Gate::define('delete-project', function (User $user, Project $project) {
            // Permetti solo se il ruolo è 'admin' o 'pi'
            return in_array($user->role, ['admin', 'pi']);
        });
    }
}