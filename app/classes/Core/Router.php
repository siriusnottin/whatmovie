<?php

namespace App\Core;

class Router
{
  private $routes = [];

  public function addRoute($method, $path, $handler)
  {
    $this->routes[] = compact('method', 'path', 'handler');
  }

  public function dispatch($requestUri, $requestMethod)
  {
    foreach ($this->routes as $route) {
      if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
        return call_user_func($route['handler']);
      }
    }
    // Log unmatched routes
    error_log("No route matched for URI: $requestUri and Method: $requestMethod");
  }
}
