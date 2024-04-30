<?php

namespace DigitalBrew\ShopBrewer\Providers;

use DigitalBrew\ShopBrewer\Modules\Admin\CleanupDashboard;
use DigitalBrew\ShopBrewer\Modules\Admin\CleanupMenu;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\DeregisterJQuery;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\DeregisterJQueryMigrate;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\LoadJQueryFromCDN;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\RemoveEmojiFromHead;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\RemoveFeedLinksFromHead;
use DigitalBrew\ShopBrewer\Modules\FrontEnd\RemoveMetaTagsFromHead;
use DigitalBrew\ShopBrewer\Modules\Global\CleanupAdminBar;
use DigitalBrew\ShopBrewer\Modules\Global\DeregisterPosts;
use DigitalBrew\ShopBrewer\Modules\Global\DisableComments;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Core\Support\Providers\RouteServiceProvider as ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
  /**
   * @throws EntryNotFoundException
   */
  public function boot(): void
  {
    $this->global();
    $this->admin();
    $this->frontend();
  }

  /**
   * @throws EntryNotFoundException
   */
  protected function global(): void
  {
//    ( new DeregisterPosts )->run();
  }

  /**
   * @throws EntryNotFoundException
   */
  protected function admin(): void
  {
//    ( new CleanupDashboard )->run();
  }

  /**
   * @throws EntryNotFoundException
   */
  protected function frontend(): void
  {
//    ( new DeregisterJQuery )->run();
  }
}
