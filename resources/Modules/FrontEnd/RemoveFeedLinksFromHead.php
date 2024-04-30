<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

class RemoveFeedLinksFromHead extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.wp-head.remove-feed-links')) {
      Action::add( 'after_setup_theme', function () {
        Action::remove( 'wp_head', 'feed_links_extra', 3 );
        Action::remove( 'wp_head', 'feed_links', 2 );
      } );
      Filter::add( 'wp_resource_hints', function ( $hints, $relation_type ) {
        if ( 'dns-prefetch' === $relation_type ) {
          return array_diff( wp_dependencies_unique_hosts(), $hints );
        }

        return $hints;
      }, 10, 2 );
    }
  }
}