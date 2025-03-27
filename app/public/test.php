<? require_once 'includes/header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    require_once '../src/db.php';
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

<?php require_once 'includes/footer.php'; ?>
