<?php

namespace DigitalBrew\ShopBrewer\Modules\Admin;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class CleanupMenu extends Module
{
  /**
   */
  public function run(): void
  {
    Action::add('admin_menu', function () {
      if ($this->getConfig('shop-brewer.admin.menu.appearance.disable-customizer')) {
        $customize_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
        remove_submenu_page( 'themes.php', $customize_url );
      }
      if ($this->getConfig('shop-brewer.admin.menu.appearance.disable-widgets')) {
        remove_submenu_page( 'themes.php', 'widgets.php' );
      }
      if ($this->getConfig('shop-brewer.admin.menu.settings.disable-writing')) {
        remove_submenu_page( 'options-general.php', 'options-writing.php' );
      }
      if ($this->getConfig('shop-brewer.admin.menu.dashboard.disable-updates')) {
        remove_submenu_page( 'index.php', 'update-core.php' );
      }
    });
  }
}

//customize.php?return=%2Fcms%2Fwp-admin%2Fthemes.php&autofocus%5Bcontrol%5D=background_image
//customize.php?return=%2Fcms%2Fwp-admin%2Fthemes.php