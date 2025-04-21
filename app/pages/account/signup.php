<?php require_once dirname((__DIR__), 2) . '/partials/_header.php'; ?>

<main data-page="signup" class="hero">
  <div class="title">
    <h1>Join The Community</h1>
    <p class="description">
      Create an account to start discovering and saving your favorite movies.
      Join us and be part of the Whaat Movie? family!
    </p>
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
      <button type="submit" class="btn btn-primary">Login</button>
      <p class="create-account">
        <span>Not part of the family yet?</span>
        <a href="/signup">Create an account</a>
      </p>
    </div>
  </form>
</main>

<?php require_once dirname((__DIR__), 2) . '/partials/_footer.php'; ?>
