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
 *  ██ ███ ██ ██   ██ ██   ██    ██    
 *   ███ ███  ██   ██ ██   ██    ██    
 * 
 *  ███    ███  ██████  ██    ██ ██ ███████ ███████ 
 *  ████  ████ ██    ██ ██    ██ ██ ██      ██      
 *  ██ ████ ██ ██    ██ ██    ██ ██ █████   █████   
 *  ██  ██  ██ ██    ██  ██  ██  ██ ██      ██      
 *  ██      ██  ██████    ████   ██ ██      ███████ 
 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?? 'Whaat Movie?'; ?></title>
</head>
<body>
  <header>
    <div class="logo">
      <a href="/">      </a>
    <nav>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/discover">Discover</a></li>
        <li><a href="/watchlist">Watchlist</a></li>
      </ul>
    </nav>
  </header>
