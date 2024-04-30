<?php

namespace DigitalBrew\ShopBrewer\Providers;

use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
//      if ($this->app->runningInConsole()) {
//        $this->publishes([
//          __DIR__ . '/../../config/shop-brewer.php' => config_path('shop-brewer.php'),
//        ], 'shop-brewer');
//      }
    }
}
