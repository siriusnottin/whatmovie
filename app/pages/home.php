<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
  'slug' => 'home',
  'title' => 'Whaat Movie?',
  'lang' => 'en',
  'description' => 'WhatMovie? is a movie recommendation engine that allows you to find movies based on your preferences and save them to your watchlist.',
  'pageTemplate' => 'home',
]);

// Start output buffering
ob_start();
?>
<main>
  <div class="hero">
    <div class="hero-content">
      <h1 class="title"><?= $page->getTitle(); ?></h1>
      <p class="description"><?= $page->getDescription(); ?></p>
    </div>
    <a href="/discover" class="btn btn-primary"><span class="btn-text">Find a movie</span><i
        class="ci-Arrow_Right_SM"></i></a>
    <div class="logo"><img src="../public/logo.svg" alt="Whaat Movie? Logo"></div>
  </div>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
  'page' => $page,
  'content' => $content,
]);
