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
  private $connection;
  private $stmt;
  private $cachedStatements = [];
  private $cacheLimit = 100; // Limit the number of cached statements

  /**
   * Constructor for the Database class.
   * Initializes the database connection and sets up necessary configurations.
   * 
   * @param string|null $host
   * @param string|null $dbname
   * @param string|null $user
   * @param string|null $password
   * @param string|null $charset
   * @param \PDO|null $pdo
   * @param mixed $pdo
   * @throws \PDOException
   */
  public function __construct(
    $host = null,
    $dbname = null,
    $user = null,
    $password = null,
    $charset = null,
    ?\PDO $pdo = null // Allow passing a PDO object directly for unit testing
  ) {
    if ($pdo) {
      $this->connection = $pdo; // Use the provided PDO object
    } else {
      // Set default values
      $host ??= $_ENV['DB_HOST'] ?? 'localhost';
      $dbname ??= $_ENV['DB_NAME'] ?? 'whatmovie';
      $user ??= $_ENV['DB_USER'] ?? 'whatmovie';
      $password ??= $_ENV['DB_PASSWORD'] ?? 'password';
      $charset ??= $_ENV['DB_CHARSET'] ?? 'utf8mb4';
      try {
        $this->connection = new \PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
        $errorMessage = "Connection failed to host '$host' and database '$dbname': " . $e->getMessage();
        throw new \PDOException($errorMessage, (int) $e->getCode());
      }
    }
  }

  public function prepare($sql, $params = [])
  {
    $cacheKey = $sql . ':' . md5(serialize($params));
    if (isset($this->cachedStatements[$cacheKey])) {
      return $this->cachedStatements[$cacheKey];
    }
    $stmt = $this->connection->prepare($sql);
    if (!$stmt) {
      throw new \RuntimeException("Failed to prepare SQL statement: $sql");
    }
    // Add the statement to the cache
    $this->cachedStatements[$cacheKey] = $stmt;

    // Enforce cache size limit
    if (count($this->cachedStatements) > $this->cacheLimit) {
      array_shift($this->cachedStatements); // Remove the oldest cached statement
    }
    return $stmt;
  }

  public function execute($params = [])
  {
    if (!$this->stmt || !($this->stmt instanceof \PDOStatement)) {
      throw new \RuntimeException("No valid SQL statement prepared for execution.");
    }
    return $this->stmt->execute($params);
  }
  public function fetch($fetchStyle = \PDO::FETCH_ASSOC)
  {
    if (!$this->stmt) {
      throw new \RuntimeException("No SQL statement prepared for fetching.");
    }
    return $this->stmt->fetch($fetchStyle);
  }
  public function fetchAll($fetchStyle = \PDO::FETCH_ASSOC)
  {
    if (!$this->stmt) {
      throw new \RuntimeException("No SQL statement prepared for fetching all.");
    }
    return $this->stmt->fetchAll($fetchStyle);
  }
  /**
   * Retrieves the ID of the last inserted row in the database.
   * 
   * @return string The ID of the last inserted row.
   */
  public function getLastInsertId()
  {
    try {
      return $this->connection->lastInsertId();
    } catch (\PDOException $e) {
      throw new \RuntimeException("Failed to retrieve the last insert ID: " . $e->getMessage(), (int) $e->getCode());
    }
  }
}
