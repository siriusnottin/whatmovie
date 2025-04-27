<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
  'slug' => '404',
  'title' => '404 - Page Not Found',
  'lang' => 'en',
  'description' => 'The page you are looking for does not exist.',
  'pageTemplate' => 'error',
]);

// Start output buffering
ob_start();
?>
<main>
  <div class="error-content">
    <h1 class="title">404</h1>
    <p class="description">The page you are looking for does not exist.</p>
    <a href="/" class="btn btn-primary">Go to Home</a>
  </div>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
  'page' => $page,
  'content' => $content,
]);
