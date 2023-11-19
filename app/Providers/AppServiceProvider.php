<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        // Log all DB SELECT statements
        // @codeCoverageIgnoreStart
        if (!app()->environment('testing')) {
            DB::listen(function ($query) {
                // if (preg_match('/^select/', $query->sql)) {
                //     Log::info('sql: ' . $query->sql);
                //     // Also available are $query->bindings and $query->time.
                // }
                Log::debug(
                    'sql: ' . $query->sql,
                    [
                        'time'       => $query->time,
                        'bindings'   => $query->bindings,
                        'connection' => $query->connection->getConfig(),
                    ]
                );
            });
        }
    }
}
