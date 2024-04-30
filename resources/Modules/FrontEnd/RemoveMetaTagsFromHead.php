<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class RemoveMetaTagsFromHead extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.wp-head.remove-meta-tags')) {
      Action::remove( 'wp_head', 'wp_generator' );
      Action::remove( 'wp_head', 'rsd_link' );
      Action::remove( 'wp_head', 'wlwmanifest_link' );
      Action::remove( 'wp_head', 'wp_shortlink_wp_head' );
    }
  }
}