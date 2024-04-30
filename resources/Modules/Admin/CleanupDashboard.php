<?php

namespace DigitalBrew\ShopBrewer\Modules\Admin;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class CleanupDashboard extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.admin.cleanup-dashboard')) {
      Action::add( 'admin_init', function () {
        // Remove the 'Welcome' panel
        Action::remove( 'welcome_panel', 'wp_welcome_panel' );

        // Remove 'Site health' metabox
        remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );

        // Remove the 'At a Glance' metabox
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

        // Remove the 'Activity' metabox
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

        // Remove the 'WordPress News' metabox
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

        // Remove the 'Quick Draft' metabox
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

        // Remove widgets related to YITH plugins
        remove_meta_box( 'yith_dashboard_products_news', 'dashboard', 'normal' );
        remove_meta_box( 'yith_dashboard_blog_news', 'dashboard', 'normal' );
      } );
    }
  }
}