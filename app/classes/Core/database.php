<?php

namespace App\Core;

/**
 * Class Database
 *
 * This class provides core functionality for interacting with the database.
 * It serves as the foundation for database operations within the application.
 *
 * @package App\Core
 */
class Database
{
  private $pdo;
  private $stmt;
  private $cachedStatements = [];

  /**
   * Constructor for the Database class.
   * Initializes the database connection and sets up necessary configurations.
   * 
   * @param mixed $host
   * @param mixed $dbname
   * @param mixed $user
   * @param mixed $password
   * @param mixed $charset
   * @param mixed $pdo
   * @throws \PDOException
   */
  public function __construct(
    $host = null,
    $dbname = null,
    $user = null,
    $password = null,
    $charset = null,
    ?\PDO $pdo = null // Allow passing a PDO object directly (for testing or other purposes)
  ) {
    if ($pdo) {
      $this->pdo = $pdo; // Use the provided PDO object
    } else {
      // Set default values
      $host = $host ?: ($_ENV['DB_HOST'] ?? 'localhost');
      $dbname = $dbname ?: ($_ENV['DB_NAME'] ?? 'whatmovie');
      $user = $user ?: ($_ENV['DB_USER'] ?? 'whatmovie');
      $password = $password ?: ($_ENV['DB_PASSWORD'] ?? 'password');
      $charset = $charset ?: ($_ENV['DB_CHARSET'] ?? 'utf8mb4');
      try {
        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
        throw new \PDOException("Connection failed: " . $e->getMessage(), (int) $e->getCode());
      }
    }
  }

  public function query($sql)
  {
    $this->stmt = $this->pdo->prepare($sql);
  }
}
