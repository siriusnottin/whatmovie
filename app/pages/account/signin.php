<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'signin',
    'title' => 'Signin - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Welcome back! Please enter your credentials to access your account.',
    'pageTemplate' => 'auth',
]);

// Start output buffering
ob_start();
?>
<main>
    <div class="auth-content">
        <h1 class="title">Signin</h1>
        <p class="description"><?= $page->getDescription(); ?></p>
    </div>
    <form action="/signin" method="POST" class="form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="remember-me">
                <input type="checkbox" id="remember-me" name="remember-me">
                Remember me
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="create-account">
                <span>Not part of the family yet?</span>
                <a href="/signup">Create an account</a>
            </p>
        </div>
    </form>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
    'page' => $page,
    'content' => $content,
]);
