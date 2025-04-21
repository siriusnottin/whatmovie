<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'account',
    'title' => 'Account - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Manage your account settings and preferences.',
    'pageTemplate' => 'account',
]);

$content = <<<HTML
<main data-page="account">
  <div class="title">
    <h1>{$page->getTitle()}</h1>
    <p class="description">{$page->getDescription()}</p>
  </div>
</main>
HTML;

echo View::render(dirname(__DIR__, 2) . '/templates/layout.php', compact('page', 'content'));
