<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path('Library/jdate.php');
        require_once app_path('Library/UploadImg.php');
        require_once app_path('Library/Resizer.php');
        require_once app_path('Library/Watermark.php');
        require_once app_path('Library/MakeTree.php');
        require_once app_path('Library/composer.php');
        Schema::defaultStringLength(191);
    }
}
