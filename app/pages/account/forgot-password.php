<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'forgot-password',
    'title' => 'Reset Password - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Enter your email address and we will send you a link to reset your password.',
    'pageTemplate' => 'auth',
]);

// Start output buffering
ob_start();
?>
<div class="auth-content">
    <h1 class="title"><?= $page->getTitle(); ?></h1>
    <p class="description"><?= $page->getDescription(); ?></p>
</div>
<form action="/forgot-password" method="POST" class="form">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </div>
</form>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
    'page' => $page,
    'content' => $content,
]);
