<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Types\EnumType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Support\Facades\DB;

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
        Paginator::useBootstrap();
        if (!Type::hasType('enum')) {
            Type::addType('enum', EnumType::class);
        }

        $platform = DB::getDoctrineConnection()->getDatabasePlatform();
        $platform->markDoctrineTypeCommented(Type::getType('enum'));
    }
}
