<?php

namespace DigitalBrew\ShopBrewer\Modules;

use Illuminate\Container\EntryNotFoundException;

class Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function getConfig($option)
  {
    if(file_exists(config_path('shop-brewer.php'))) {
      return config($option);
    }

    return config(str_replace('shop-brewer', 'shop_brewer_settings', $option));
  }
}