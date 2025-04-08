<?php
/**
 * Header Partial for Movie App
 * 
 * This file is part of the Movie App.
 * 
 * @copyright 2025 Sirius Nottin
 * @license   MIT License (see LICENSE file in the project root)
 * 
 * This partial is responsible for rendering the header of the application.
 * It includes the HTML structure, links to stylesheets, and navigation menu.
 * Included at the beginning of each page to ensure a consistent layout.
 */
?>

<!--
 *  ██     ██ ██   ██  █████  ████████ 
 *  ██     ██ ██   ██ ██   ██    ██    
 *  ██  █  ██ ███████ ███████    ██    
 *  ██ ███ ██ ██   ██ ██   ██    ██  Sirius Nottin 4/2025
 *   ███ ███  ██   ██ ██   ██    ██      nottin.me
 *
 *  ███    ███  ██████   ██████  ██    ██ ██ ███████ 
 *  ████  ████ ██    ██ ██    ██ ██    ██ ██ ██      
 *  ██ ████ ██ ██    ██ ██    ██ ██    ██ ██ █████   
 *  ██  ██  ██ ██    ██ ██    ██  ██  ██  ██ ██      
 *  ██      ██  ██████   ██████    ████   ██ ███████ 
 *                   
 *                Curious, ha?
 *           nottin.me/p/whaatmovie
 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?? 'Whaat Movie?'; ?></title>
  <link rel="stylesheet" href="../src/styles/output.css">
  <link rel="stylesheet" href="../src/styles/coolicons.css">
</head>
<body>
  <header>
    <div class="breandcrumbs">
      <i class="ci-House_01"></i>
      <div>
        <a href="/">Home</a>
        <span class="separator">/</span>
        <a href="/signin">Signin</a>
      </div>
    </div>
    <form action="search.php" method="GET" class="search-form">
      <i class="ci-Search_Magnifying_Glass"></i>
      <input type="text" name="query" placeholder="Search a movie"
        class="search-input" aria-label="Search for a movie">
      <span class="shortcut-txt">⌘K</span>
    </form>
    <nav class="account-nav">
      <a href="/account">Sirius</a>
      <i class="ci-User_Circle"></i>
    </nav>
  </header>
