<?php

namespace DigitalBrew\ShopBrewer\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;
use Themosis\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Controller namespace for plugin routes.
     *
     * @var string
     */
    protected $namespace = 'DigitalBrew\ShopBrewer\Controllers';

    public function boot()
    {
        parent::boot();
    }

    /**
     * Load plugin routes.
     */
    public function map()
    {
      $plugin_dev_path = '/Volumes/Work/Code/Wordpress/plugins/';
      if (env('APP_ENV') === 'local') {
        $pluginName = ltrim(
          str_replace($plugin_dev_path, '', realpath(__DIR__.'/../../')),
          '\/'
        );
      } else {
        $pluginName = ltrim(
          str_replace(plugins_path(), '', realpath(__DIR__.'/../../')),
          '\/'
        );
      }

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(plugins_path($pluginName.'/routes.php'));
    }
}
