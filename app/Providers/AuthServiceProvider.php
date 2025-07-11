<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        // Tenta carregar as permissões do banco de dados.
        // O `Schema::hasTable` evita erros durante a primeira migração.
        if (Schema::hasTable('permissions')) {
            // Pega todas as permissões
            $permissions = Permission::all();

            // Define um Gate para cada permissão existente
            foreach ($permissions as $permission) {
                Gate::define($permission->name, function (User $user) use ($permission) {
                    // Usa o método que acabamos de criar no model User
                    return $user->hasPermissionTo($permission);
                });
            }
        }

        // (Opcional) Gate de Super Admin que sempre retorna true
        Gate::before(function (User $user) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });
    }
}
