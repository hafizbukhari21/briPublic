<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        //
        Blade::directive('convertRole', function ($number) {
            switch($number){
                case '1':
                    return "CEO";
                    break;
                case '2':
                    return "Regional Head";
                    break;
                case '3':
                    return "Division Head";
                    break;
                case '4':
                    return "Section Head";
                    break;
                case '5':
                    return "Staff";
                    break;
                case '6':
                    return "Super User";
                    break;
                default:
                    echo "error";
            };
                    
                    
        });
    }
}
