<?php

namespace App\Providers;

use App\Models\Companies;
use App\Models\Diary;
use App\Policies\CompaniesPolicy;
use App\Policies\DiaryPolicy;
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
        // 'App\Models\Companies' => 'App\Policies\CompaniesPolicy',
        'App\Models\User' => 'App\Policies\DiaryPolicy',
        'App\Models\Locks' => 'App\Policies\LocksPolicy',
        // Companies::class => CompaniesPolicy::class,
        // Diary::class => DiaryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
