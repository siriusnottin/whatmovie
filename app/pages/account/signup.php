<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'signup',
    'title' => 'Sign Up - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Create an account to start discovering and saving your favorite movies.',
    'pageTemplate' => 'auth',
]);

$content = <<<HTML
<div class="auth-content">
    <h1 class="title">{$page->getTitle()}</h1>
    <p class="description">{$page->getDescription()}</p>
</div>
<form action="/signup" method="POST" class="form">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </div>
</form>
HTML;

echo View::render(dirname(__DIR__, 2) . '/templates/auth-layout.php', compact('page', 'content'));
