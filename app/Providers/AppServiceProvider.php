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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Phfoxer\ApiGenerate\ApiGenerateServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Log all DB SELECT statements
        // @codeCoverageIgnoreStart
        if (!app()->environment('production')) {
            DB::listen(function ($query) {
                // dd($query);
                // if (preg_match('/^select/', $query->sql)) {
                //     Log::info('sql: ' . $query->sql);
                //     // Also available are $query->bindings and $query->time.
                // }
                // Log::debug(
                // foreach ($query->bindings as $binding) {
                //     foreach ($binding as $key => $value) {
                //         // code...
                //         echo "$key => $value\n";
                //     }
                // }
                Log::info(
                    'Connection: ' . $query->connectionName,
                    [
                        'time'     => $query->time,
                        'sql: '    => $query->sql,
                        'bindings' => $query->bindings,
                        'conig'    => $query->connection->getConfig(),
                    ]
                );
            });
        }
    }
}
