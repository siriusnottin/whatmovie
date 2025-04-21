<?php require_once dirname((__DIR__), 2) . '/partials/_header.php'; ?>

<main data-page="signin" class="hero">
  <div class="content">
    <h1 class="title">Login</h1>
    <p class="description">
      Welcome back! Please enter your credentials to access your account.
    </p>
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

<?php require_once dirname((__DIR__), 2) . '/partials/_footer.php'; ?>
