<?php

use App\Core\Database;
use PHPUnit\Framework\TestCase;

/**
 * Class DatabaseTest
 *
 * This class contains unit tests for the Database functionality.
 * It ensures that the Database class behaves as expected under various conditions.
 *
 * @package Tests\Core
 */
class DatabaseTest extends TestCase
{
  private $database;

  protected function setUp(): void
  {
    // Mock the PDO object to avoid actual database connections
    $mockPdo = $this->createMock(\PDO::class);
    $mockPdo->method('prepare')->willReturn($this->createMock(\PDOStatement::class));

    // Pass the mock PDO object directly to the Database constructor
    $this->database = new Database(pdo: $mockPdo);
  }

  public function testQueryPreparesStatement()
  {
    $mockStmt = $this->createMock(\PDOStatement::class);
    $mockPdo = $this->createMock(\PDO::class);
    $mockPdo->expects($this->once())
      ->method('prepare')
      ->with('SELECT * FROM user')
      ->willReturn($mockStmt);

    // Use reflection to inject the mock PDO object into the Database instance
    $this->database = new Database(pdo: $mockPdo);
    $reflection = new \ReflectionClass($this->database);
    $pdoProperty = $reflection->getProperty('pdo');
    $pdoProperty->setAccessible(true);
    $pdoProperty->setValue($this->database, $mockPdo);

    $this->database->query('SELECT * FROM user');
  }
}
