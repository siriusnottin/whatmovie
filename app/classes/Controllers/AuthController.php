<?php

namespace App\Controllers;

use App\Core\Database;

/**
 * Class AuthController
 *
 * This class handles authentication-related operations such as user login, logout, and registration.
 * It is part of the Controllers namespace and is responsible for managing authentication workflows.
 *
 * @package App\Classes\Controllers
 */
class AuthController
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  /**
   * Handles user sign-in.
   * 
   * This method processes the sign-in request,
   * validates user credentials, and initiates a session if successful.
   *
   * @return void
   */
  public function signin()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = $_POST['username'] ?? '';
      $password = $_POST['password'] ?? '';

      // Validate input
      // TODO: Move validation logic to a dedicated method or class
      if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        return;
      }

      // Check credentials in the database
      $stmt = $this->db->prepare("SELECT id, username, password FROM user WHERE username = :username");
      $stmt->bindParam(":username", $username);
      $stmt->execute();
      $user = $stmt->fetch();
      if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: /account/profile');
        exit;
      } else {
        echo "Invalid credentials.";
      }
    }
  }
}
