<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
  'slug' => 'error',
  'title' => 'Error - Whaat Movie?',
  'lang' => 'en',
  'description' => 'An error occurred while processing your request.',
  'pageTemplate' => 'error',
]);

// Start output buffering
ob_start();
?>
<main>
  <div class="error-content">
    <h1 class="title">Oops!</h1>
    <p class="description">Something went wrong. Please try again later.</p>
    <a href="/" class="btn btn-primary">Go to Home</a>
  </div>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__) . "/templates/{$page->getPageTemplate()}-layout.php", [
  'page' => $page,
  'content' => $content,
]);
