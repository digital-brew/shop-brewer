<?php

namespace DigitalBrew\ShopBrewer\Modules\Global;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class DeregisterPosts extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.global.deregister-posts')) {
      Action::add('init', function () {
        // Unregister post type
        register_post_type('post', []);
        // Unregister categories
        register_taxonomy('category', []);
        // Unregister tags
        register_taxonomy('post_tag', []);
        // Unregister widget
        unregister_widget('WP_Widget_Categories');
      });
    }
  }
}