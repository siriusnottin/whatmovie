<?php

namespace App\Core;

class View
{
  public static function render($template, $data = [])
  {
    extract($data);
    ob_start();
    require $template;
    return ob_get_clean();
  }
}
