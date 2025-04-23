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
        // Generate a secure token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $stmt = $this->db->prepare("INSERT INTO user_tokens (user_id, token, expires_at) VALUES (:user_id, :token, :expires_at)");
        $stmt->bindParam(":user_id", $user['id']);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":expires_at", date('Y-m-d H:i:s', time() + 3600)); // 1-hour expiration
        $stmt->execute();

        // Set the token as a secure, HTTP-only cookie
        setcookie('auth_token', $token, [
          'expires' => time() + 3600, // 1-hour
          'path' => '/',
          'domain' => $_SERVER['HTTP_HOST'] ?? '',
          'secure' => $_ENV['APP_ENV'] === 'production' ? true : false, // Use secure cookies in production
          'httponly' => true,
          'samesite' => 'Strict',
        ]);

        // Redirect to the profile page
        header('Location: /account');
      } else {
        echo 'Invalid credentials.';
      }
    }
  }

  /**
   * Validates the user's authentication token.
   *
   * @return bool True if the token is valid, false otherwise.
   */
  public function validateToken(): bool
  {
    // Check if the auth_token cookie is set
    if (!isset($_COOKIE['auth_token'])) {
      return false;
    }

    $token = $_COOKIE['auth_token'];

    // Query the database to validate the token
    $stmt = $this->db->prepare("SELECT user_id, expires_at FROM user_tokens WHERE token = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    $tokenData = $stmt->fetch();

    // Check if the token exists and is not expired
    if ($tokenData && strtotime($tokenData['expires_at']) > time()) {
      return true;
    }

    // If the token is invalid or expired, delete it from the database
    $stmt = $this->db->prepare("DELETE FROM user_tokens WHERE token = :token");
    $stmt->bindParam(":token", $token);
    $stmt->execute();

    return false;
  }

  /**
   * Handles user sign-out.
   *
   * This method terminates the user's session and clears the authentication token.
   *
   * @return void
   */
  public function signout()
  {
    // Clear the auth_token cookie
    setcookie('auth_token', '', [
      'expires' => time() - 3600, // Expire the cookie
      'path' => '/',
      'domain' => $_SERVER['HTTP_HOST'] ?? '',
      'secure' => $_ENV['APP_ENV'] === 'production',
      'httponly' => true,
      'samesite' => 'Strict',
    ]);

    // Redirect to the home page
    header('Location: /');
    exit;
  }

  /**
   * Requires user authentication.
   *
   * This method checks if the user is authenticated by validating the token.
   * If the token is invalid, it redirects to the sign-in page.
   *
   * @return void
   */
  public function requireAuth(): void
  {
    if (!$this->validateToken()) {
      echo 'Unauthorized access. Please sign in.';
      header('Location: /signin'); // Redirect to the sign-in page
      exit;
    }
  }
}
