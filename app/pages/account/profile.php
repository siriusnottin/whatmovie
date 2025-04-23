<?php

require_once dirname(__DIR__, 2) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;
use App\Models\User;

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
  <select name="accountMenu" id="accountMenu">
    <option value="account">Profile</option>
    <option value="password">Password</option>
  </select>
  <form action="/account/update" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" disabled
        value="<?= htmlspecialchars($user ? $user->getUsername() : '', ENT_QUOTES); ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required
        value="<?= htmlspecialchars($user->getEmail(), ENT_QUOTES); ?>">
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
