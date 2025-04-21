<?php

namespace App\Core;

class Page
{
  private $slug;
  private $title;
  private $lang;
  private $description;
  private $pageTemplate;
  private $styles;
  private $scripts;

  // Default styles included on every page
  private $BASE_STYLES = [
    'output.css',
    'coolicons.css'
  ];

  // List of valid page templates
  private $PAGE_TEMPLATES = [
    'home',
    'hero',
    'auth',
    'account'
  ];
  public function __construct(array $config = [])
  {
    $this->slug = $config['slug'] ?? '';
    $this->title = $config['title'] ?? '';
    $this->lang = $config['lang'] ?? 'en';
    $this->description = $config['description'] ?? '';
    $this->pageTemplate = isset($config['pageTemplate']) && in_array($config['pageTemplate'], $this->PAGE_TEMPLATES) ? $config['pageTemplate'] : null;
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
    return $this->pageTemplate;
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
    return "data-page='{$this->slug}'";
  }
}
