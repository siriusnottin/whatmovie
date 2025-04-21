<?php require_once dirname((__DIR__), 2) . '/partials/_header.php'; ?>

<main data-page="forgot-password" class="hero">
  <div class="title">
    <h1>Reset password</h1>
    <p class="description">
      Enter your email address and we will send you a link to reset your password.
    </p>
  </div>
  <form action="" method="POST" class="form">
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

<?php require_once dirname((__DIR__), 2) . '/partials/_footer.php'; ?>
