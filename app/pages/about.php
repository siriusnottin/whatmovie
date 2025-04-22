<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'about',
    'title' => 'About Us - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Learn more about the story behind Whaat Movie?',
    'pageTemplate' => 'about',
]);

// Start output buffering
ob_start();
?>
<h1 class="title">Story Time!</h1>
<div class="content">
    <p>Figma ipsum component variant main layer. Rectangle strikethrough community asset star blur share...</p>
    <p>Mask figma edit effect pencil arrange frame arrow scrolling...</p>
    <p>Slice layer device inspect pixel. Component create arrange pixel bold group...</p>
</div>
<?php
$content = ob_get_clean();

// Render the page using the View class
echo View::render(dirname(__DIR__) . '/templates/layout.php', [
    'page' => $page,
    'content' => $content,
]);
