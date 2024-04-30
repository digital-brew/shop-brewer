<?php

namespace DigitalBrew\ShopBrewer\Modules\FrontEnd;

use DigitalBrew\ShopBrewer\Modules\Module;
use Illuminate\Container\EntryNotFoundException;
use Themosis\Support\Facades\Action;

class RemoveEmojiFromHead extends Module
{
  /**
   * @throws EntryNotFoundException
   */
  public function run(): void
  {
    if ($this->getConfig('shop-brewer.frontend.wp-head.remove-emoji')) {
      Action::remove( 'wp_print_styles', 'print_emoji_styles' );
      Action::remove( 'wp_head', 'print_emoji_detection_script', 7 );
    }
  }
}