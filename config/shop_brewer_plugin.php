<?php

  use DigitalBrew\ShopBrewer\Providers\AssetServiceProvider;
  use DigitalBrew\ShopBrewer\Providers\ModuleServiceProvider;
  use DigitalBrew\ShopBrewer\Providers\RouteServiceProvider;

return [
  /*
    |--------------------------------------------------------------------------
    | Plugin Settings
    |--------------------------------------------------------------------------
    |
    | Enable or disable various WordPress settings.
    |
    */
  "settings" => [
    'wpadminbar' => [
      'remove_wp_logo' => true
    ],
    'admin' => [
      'disable_comments' => true,
      'clean_up_dashboard' => true,
      'disable_posts' => true
    ],
    'front' => [

    ]
  ],
  /*
  |--------------------------------------------------------------------------
  | Plugin Class Autoloading
  |--------------------------------------------------------------------------
  |
  | Define PSR-4 autoloading rules for your plugin PHP classes. The key is
  | the namespace and the value is the relative path, from plugin's root
  | directory, to the directory holding your files.
  |
  */
  'autoloading' => [
    'DigitalBrew\\ShopBrewer\\' => 'resources'
  ],

  /*
  |--------------------------------------------------------------------------
  | Plugin Service Providers
  |--------------------------------------------------------------------------
  |
  | The service providers listed here will be automatically loaded on the
  | request to your application. Feel free to add your own services to
  | this array to grant expanded functionality to your application.
  |
  */
  'providers' => [
    AssetServiceProvider::class,
    ModuleServiceProvider::class,
    RouteServiceProvider::class
  ],

  /*
  |--------------------------------------------------------------------------
  | Plugin views directories path.
  |--------------------------------------------------------------------------
  |
  | You can define a list of directories paths for the views of your plugin.
  | Paths are relatives to the plugin base directory.
  |
  */
  'views' => [
    'views'
  ]
];
