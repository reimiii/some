<?php

namespace App\Providers;

use App\Models\Moderator;
use App\Policies\ModeratorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
//        Moderator::class => ModeratorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('SSmod', function () {
            return auth()->guard('moderator')->user()->email === 'imiia75775@gmail.com';
        });

        Gate::define('moderator', function (Moderator $moderator) {
            return auth()->guard('moderator')->user()->id === $moderator->id;
        });
    }
}
