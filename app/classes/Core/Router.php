<?php

namespace App\Core;

class Router
{
  private $routes = [];
  private $middleware = [];

  public function addRoute($method, $path, $handler)
  {
    $this->routes[] = compact('method', 'path', 'handler');
  }

  public function addMiddleware(callable $middleware)
  {
    $this->middleware[] = $middleware;
  }

  public function dispatch($requestUri, $requestMethod)
  {
    foreach ($this->middleware as $middleware) {
      $middleware($requestUri, $requestMethod);
    }

    foreach ($this->routes as $route) {
      $pattern = preg_replace('/:\w+/', '(\w+)', $route['path']);
      if ($route['method'] === $requestMethod && preg_match("#^$pattern$#", $requestUri, $matches)) {
        array_shift($matches); // Remove full match
        return call_user_func_array($route['handler'], $matches);
      }
    }
    http_response_code(404);
    include dirname(__DIR__, 2) . '/pages/errors/404.php';
  }
}
