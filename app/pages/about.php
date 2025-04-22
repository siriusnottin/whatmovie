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
    <p>Figma ipsum component variant main layer. Rectangle strikethrough community asset star blur share. Create
        duplicate link overflow bold blur opacity group flows. Arrange figma shadow figjam editor. Frame blur group
        effect share strikethrough team rectangle undo. Underline union list shadow opacity strikethrough link italic.
        Bold strikethrough prototype arrange vertical overflow group pen align. Pencil distribute link scrolling effect
        image figjam polygon polygon. Content frame font shadow vertical asset device line underline star.</p>
    <p>Mask figma edit effect pencil arrange frame arrow scrolling. Image comment pen line undo export asset union
        underline frame. Ellipse connection subtract style plugin invite background stroke. Opacity vector selection
        flows ellipse editor device font pen list. Group edit library slice rectangle slice selection. Project fill
        arrow library boolean opacity align align arrow. Inspect content edit group group subtract invite rectangle.
        Bullet style opacity link flatten font editor. Subtract ipsum community reesizing layout content outline
        thumbnail. Group frame subtract strikethrough plugin draft outline polygon layer rotate. Content scale move text
        style move background. Reesizing undo union edit connection figma blur.</p>
    <p>Slice layer device inspect pixel. Component create arrange pixel bold group. Shadow flatten fill flows bullet
        bullet reesizing vertical. Link move comment slice style layer pixel clip image frame. Arrow font figma mask
        fill plugin layer undo content. Mask asset image clip plugin reesizing connection device opacity select. Flows
        background duplicate thumbnail prototype. Thumbnail mask invite main style stroke draft slice rotate.</p>
</div>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
    'page' => $page,
    'content' => $content,
]);
