<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
  'slug' => '500',
  'title' => '500 - Internal Server Error',
  'lang' => 'en',
  'description' => 'An unexpected error occurred on the server.',
  'pageTemplate' => 'error',
]);

// Start output buffering
ob_start();
?>
<main>
  <div class="error-content">
    <h1 class="title">500</h1>
    <p class="description">An unexpected error occurred on the server. Please try again later.</p>
    <a href="/" class="btn btn-primary">Go to Home</a>
  </div>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
  'page' => $page,
  'content' => $content,
]);
