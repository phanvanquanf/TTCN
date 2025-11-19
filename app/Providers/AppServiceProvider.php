<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Client\Menu as ClientMenu;
use App\Models\Admin\AdminMenu;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('client.layouts.header', function ($view) {
            $menus = ClientMenu::where('isActive', '1')
                ->orderBy('menuOrder')
                ->get();
            $view->with('menus', $menus);
        });

        View::composer('admin.layouts.header', function ($view) {
            $menus = adminMenu::where('isActive', '1')
                ->orderBy('itemOrder')
                ->get();
            $view->with('menus', $menus);
        });
    }
}
