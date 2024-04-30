<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

class LoadJQueryFromCDN extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.load-jquery-from-cdn')) {
      Action::add( [ 'wp_enqueue_scripts', 'login_enqueue_scripts' ], function () {
        global $wp_version;

        if ( ! is_admin() ) {
          wp_enqueue_script( 'jquery' );

          // Get current version of jQuery from WordPress core
          $wp_jquery_ver         = $GLOBALS['wp_scripts']->registered['jquery-core']->ver;
          $wp_jquery_migrate_ver = $GLOBALS['wp_scripts']->registered['jquery-migrate']->ver;

          $jquery_cdn_url = '//ajax.googleapis.com/ajax/libs/jquery/' . $wp_jquery_ver . '/jquery.min.js';

          $jquery_migrate_cdn_url = '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/' . $wp_jquery_migrate_ver . '/jquery-migrate.min.js';

          // Deregister jQuery and jQuery Migrate
          wp_deregister_script( 'jquery-core' );
          wp_deregister_script( 'jquery-migrate' );

          // Register jQuery with CDN URL
          wp_register_script( 'jquery-core', $jquery_cdn_url, '', null, true );
          // Register jQuery Migrate with CDN URL
          wp_register_script( 'jquery-migrate', $jquery_migrate_cdn_url, [ 'jquery-core' ], null, true );
        }
      } );

      Filter::add( 'script_loader_src', function ( $src, $handle = null ) {

        if ( ! is_admin() ) {

          static $add_jquery_fallback = false;

          if ( $add_jquery_fallback ) :
            echo '<script>window.jQuery || document.write(\'<script src="' . includes_url( 'js/jquery/jquery.js' ) . '"><\/script>\')</script>' . "\n";
            $add_jquery_fallback = false;
          endif;

          if ( $handle === 'jquery-core' ) {
            $add_jquery_fallback = true;
          }

          return $src;

        }

        return $src;

      }, 10, 2 );
    }
  }
}