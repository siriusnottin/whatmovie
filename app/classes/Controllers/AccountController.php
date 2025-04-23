<?php

namespace App\Controllers;

use App\Core\Database;

class AccountController
{
  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      // Validate input
      if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        return;
      }

      // Check credentials in the database
      $db = new Database();
      $stmt = $db->query("SELECT * FROM user WHERE username = :username");
      $stmt->execute(['username' => $username]);
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: /account');
        exit;
      } else {
        echo "Invalid credentials.";
      }
    }
  }
}
