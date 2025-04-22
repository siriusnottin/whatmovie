<?php

namespace App\Core;

/**
 * Class PageDetector
 *
 * This class is responsible for detecting the current page slug
 * based on the request URI. It provides functionality to parse
 * the URI and determine the corresponding page identifier.
 *
 * Detects the current page slug based on the request URI.
 */
class PageDetector {
  public static function getCurrentPageSlug(): string {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    if (empty($uri)) {
      return 'home';
    }
    $segments = explode('/', trim($uri, '/'));
    $pageSlug = end($segments);
    if (empty($pageSlug)) {
      return 'home';
    }
    return $pageSlug;
  }
}
