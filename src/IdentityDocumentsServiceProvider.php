<?php

namespace Werk365\IdentityDocuments;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class IdentityDocumentsServiceProvider extends ServiceProvider
{
    /**
     * The console commands.
     *
     * @var bool
     */
    protected $commands = [
        'Werk365\IdentityDocuments\Commands\MakeService',
    ];

    /**
     * Bootstrap the application events.
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/identitydocuments.php' => config_path('identitydocuments.php'),
        ]);
    }

    /**
     * Register the command.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/identitydocuments.php', 'identitydocuments');
        $this->mergeConfigFrom(__DIR__.'/../config/countries.php', 'id_countries');
        $this->commands($this->commands);
    }
}
