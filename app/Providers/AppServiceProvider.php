<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        DB::listen(function ($query) {

            // Only capture UPDATE queries
            if (str_starts_with(strtolower($query->sql), 'update') && str_contains($query->sql, 'members')) {

                $sql = vsprintf(
                    str_replace('?', "'%s'", $query->sql),
                    $query->bindings
                );

                // Save into SQL file
                File::append(
                    storage_path('logs/profile_updates.sql'),
                    $sql . ";\n"
                );
            }
        });
    }
}
