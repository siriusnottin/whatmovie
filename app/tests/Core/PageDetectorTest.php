<?php

use PHPUnit\Framework\TestCase;
use App\Core\PageDetector;

/**
 * Class PageDetectorTest
 *
 * This class contains unit tests for the PageDetector functionality.
 * It ensures that the PageDetector behaves as expected under various conditions.
 *
 * @package Tests\Core
 */
class PageDetectorTest extends TestCase
{
  private $originalRequestUri;

  protected function setUp(): void
  {
    // Backup the original $_SERVER['REQUEST_URI']
    $this->originalRequestUri = $_SERVER['REQUEST_URI'] ?? null;
  }

  protected function tearDown(): void
  {
    // Restore the original $_SERVER['REQUEST_URI']
    if ($this->originalRequestUri !== null) {
      $_SERVER['REQUEST_URI'] = $this->originalRequestUri;
    } else {
      unset($_SERVER['REQUEST_URI']);
    }
  }

  public function testGetCurrentPageSlugReturnsHomeForEmptyUri()
  {
    $_SERVER['REQUEST_URI'] = '/';
    $this->assertEquals('home', PageDetector::getCurrentPageSlug());
  }

  public function testGetCurrentPageSlugReturnsCorrectSlug()
  {
    $_SERVER['REQUEST_URI'] = '/about-us';
    $this->assertEquals('about-us', PageDetector::getCurrentPageSlug());
  }

  public function testGetCurrentPageSlugHandlesTrailingSlash()
  {
    $_SERVER['REQUEST_URI'] = '/contact/';
    $this->assertEquals('contact', PageDetector::getCurrentPageSlug());
  }

  public function testGetCurrentPageSlugHandlesMultipleSegments()
  {
    $_SERVER['REQUEST_URI'] = '/blog/post-title';
    $this->assertEquals('post-title', PageDetector::getCurrentPageSlug());
  }
}
