<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before(function ($user){
           
            foreach ($user -> roles as $role){
               
                $permission = json_decode($role -> permissions,true);
                foreach ($permission as $request => $on){
                    //Define method determine if a user is authorized to perform a given action
                    //Gate define just return true or false
                    Gate::define($request, function () use ($on){
                        return $on;
                    });
                }
            }
        });
        //
    }
}
