<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.sidebar', function ($view) {

            if (!auth()->check()) {
                return;
            }

            $roleIds = auth()->user()
                ->roles
                ->pluck('id')
                ->toArray();

            $menus = Menu::whereNull('parent_id')
                ->where('is_active', 1)
                ->whereHas('roles', function ($q) use ($roleIds) {
                    $q->whereIn('roles.id', $roleIds);
                })
                ->with(['children' => function ($q) use ($roleIds) {
                    $q->whereHas('roles', function ($qr) use ($roleIds) {
                        $qr->whereIn('roles.id', $roleIds);
                    })
                    ->where('is_active', 1)
                    ->orderBy('order');
                }])
                ->orderBy('order')
                ->get();

            $view->with('menus', $menus);
        });
    }

}