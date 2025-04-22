<?php

use PHPUnit\Framework\TestCase;

/**
 * Class GetEnvTest
 *
 * This class contains unit tests for checking the environment variable `APP_ENV`.
 *
 * @package Tests
 */
class GetEnvTest extends TestCase
{
  /**
   * @var array Holds the original $_ENV array for restoration after tests.
   */
  private $originalEnv;
  protected function setUp(): void
  {
    // Backup the original $_ENV array
    $this->originalEnv = $_ENV;
  }

  protected function tearDown(): void
  {
    // Restore the original $_ENV array
    $_ENV = $this->originalEnv;
  }

  public function testAppEnvIsDevelopment()
  {
    // Set the environment variable
    $_ENV['APP_ENV'] = 'development';

    // Assert that the environment variable is set to "development"
    $this->assertEquals('development', $_ENV['APP_ENV']);
  }

  public function testAppEnvIsNotDevelopment()
  {
    // Set the environment variable to a different value
    $_ENV['APP_ENV'] = 'production';

    // Assert that the environment variable is not "development"
    $this->assertNotEquals('development', $_ENV['APP_ENV']);
  }
}
