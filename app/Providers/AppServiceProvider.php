<?php

namespace App\Providers;

use App\Models\ExpertEndorsement;
use App\Models\Post;
// Models
use App\Policies\ExpertEndorsementPolicy;
use App\Policies\PostPolicy;
// Policies
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // تسجيل أي bindings أو singletons عند الحاجة
    }

    public function boot(): void
    {
        // تسجيل الـPolicies يدوياً في Laravel 11/12
        Gate::policy(Post::class, PostPolicy::class);
        Gate::policy(ExpertEndorsement::class, ExpertEndorsementPolicy::class);

        // اختيارياً: امنح admin صلاحيات شاملة
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
    }
}
