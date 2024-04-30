<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class DeregisterJQuery extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.deregister-jquery')) {
      Action::add( 'init', function () {
        if ( ! is_admin() ) {
          wp_deregister_script( 'jquery' );
          wp_register_script( 'jquery', false );
        }
      } );
    }
  }
}