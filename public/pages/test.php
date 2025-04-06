<? require_once dirname(__DIR__) . '/configs/env.php'; ?>
<? require_once  APP_DIR . '/partials/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    require_once CONFIG_DIR . '/database.php';
    $test = $_POST['test'];
    $sql = "INSERT INTO movie (title) VALUES (:name)";
    $pdo->prepare($sql)->execute(['name' => $test]);
    echo 'Added ' . $test . ' to the database.';
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

?>

<h1>Test</h1>

<p>Some test.</p>

<form method="post">
  <input type="text" name="test">
  <button type="submit">Submit</button>
</form>

<? require_once APP_DIR . '/partials/footer.php'; ?>
