<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class DeregisterJQueryMigrate extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.deregister-jquery-migrate')) {
      Action::add( 'wp_default_scripts', function ( $scripts ) {
        if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
          $script = $scripts->registered['jquery'];

          if ( $script->deps ) { // Check whether the script has any dependencies
            $script->deps = array_diff( $script->deps, [ 'jquery-migrate' ] );
          }
        }
      } );
    }
  }
}