<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
  'slug' => 'home',
  'title' => 'Whaat Movie?',
  'lang' => 'en',
  'description' => 'WhatMovie? is a movie recommendation engine that allows you to find movies based on your preferences and save them to your watchlist.',
  'pageTemplate' => 'home',
]);
// Render the page using the View class
echo View::render(dirname(__DIR__) . '/templates/layout.php', [
  'page' => $page,
  'content' => <<<HTML
      <main>
        <div class="hero">
            <div class="content">
                <h1 class="title">{$page->getTitle()}</h1>
                <p class="description">{$page->getDescription()}</p>
            </div>
            <a href="/discover" class="btn btn-primary"><span class="btn-text">Find a movie</span><i class="ci-Arrow_Right_SM"></i></a>
            <div class="logo"><img src="../public/logo.svg" alt="Whaat Movie? Logo"></div>
        </div>
      </main>
    HTML,
]);
