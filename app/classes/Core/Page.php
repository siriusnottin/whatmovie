<?php

namespace App\Core;

class Page
{
  private $slug;
  private $title;
  private $lang;
  private $description;
  private $layoutTemplate;
  private $styles;
  private $scripts;
  private $db;

  // Default styles included on every page
  private $BASE_STYLES = [
    'output.css',
    'coolicons.css'
  ];

  // List of valid page templates
  private $PAGE_TEMPLATES = [
    'home',
    'about',
    'discover',
    'auth',
    'account',
    'error',
  ];
  public function __construct(array $config = [])
  {
    $this->db = $config['db'] ?? null;
    $this->slug = $config['slug'] ?? '';
    $this->slug = $config['slug'] ?? '';
    $this->title = $config['title'] ?? '';
    $this->lang = $config['lang'] ?? 'en';
    $this->description = $config['description'] ?? '';
    if (isset($config['pageTemplate']) && !in_array($config['pageTemplate'], $this->PAGE_TEMPLATES)) {
      throw new \InvalidArgumentException("Page template '{$config['pageTemplate']}' does not exist.");
    }
    $this->layoutTemplate = $config['pageTemplate'] ?? null;
    $this->styles = array_merge($this->BASE_STYLES, isset($config['styles']) && is_array($config['styles']) ? $config['styles'] : []);
    $this->scripts = isset($config['scripts']) && is_array($config['scripts']) ? $config['scripts'] : [];
  }

  public function getSlug()
  {
    return $this->slug;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getLang()
  {
    return $this->lang;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getPageTemplate()
  {
    return $this->layoutTemplate;
  }
  public function renderStyles()
  {
    $styles = '';
    foreach ($this->styles as $style) {
      $styles .= "<link rel='stylesheet' href='../src/styles/{$style}'>\n";
    }
    return $styles;
  }

  public function renderScripts()
  {
    $scripts = '';
    foreach ($this->scripts as $script) {
      $scripts .= "<script src='../src/scripts/{$script}'></script>\n";
    }
    return $scripts;
  }

  public function renderBodyAttributes()
  {
    return "data-layout='{$this->layoutTemplate}' data-page='{$this->slug}'";
  }

  public function renderPageTemplate()
  {
    if ($this->layoutTemplate) {
      return "templates/{$this->layoutTemplate}-layout.php";
    }
    return 'templates/default-layout.php';
  }
}
