<?php

namespace DigitalBrew\ShopBrewer\Modules\Global;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class CleanupAdminBar extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    Action::add('admin_bar_menu', function($wp_admin_bar) {
      if ($this->getConfig('shop-brewer.global.adminbar.disable-comments')) {
        $wp_admin_bar->remove_node('comments');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-menu-toggle')) {
        $wp_admin_bar->remove_node('menu-toggle');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-my-account')) {
        $wp_admin_bar->remove_node('my-account');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-new-content')) {
        $wp_admin_bar->remove_node('new-content');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-site-name')) {
        $wp_admin_bar->remove_node('site-name');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-widgets')) {
        $wp_admin_bar->remove_node('widgets');
      }
      if ($this->getConfig('shop-brewer.global.adminbar.disable-wp-logo')) {
        $wp_admin_bar->remove_node('wp-logo');
      }
    }, 999);
  }
}