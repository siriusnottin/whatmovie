<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Controllers\AuthController;
use App\Core\Page;
use App\Core\View;

// Require authentication
$authController = new AuthController();
$authController->requireAuth();

$page = new Page([
  'slug' => 'profile',
  'title' => 'My Account - Whaat Movie?',
  'lang' => 'en',
  'description' => 'Manage your account settings and preferences.',
  'pageTemplate' => 'account',
]);

// Start output buffering
ob_start();
?>
<main>
  <h1 hidden>Account Settings</h1>
  <nav>
    <ul>
      <li><a href="/account/profile">Profile</a></li>
      <li><a href="/account/password">Password</a></li>
    </ul>
  </nav>
  <form action="/account/update" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" disabled value="">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required value="">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</main>
<?php
$content = ob_get_clean();

echo View::render(dirname(__DIR__, 2) . "/templates/{$page->getPageTemplate()}-layout.php", [
  'page' => $page,
  'content' => $content,
]);
