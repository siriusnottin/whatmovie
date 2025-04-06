<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--TODO: Add dynamic title population -->
  <title>WhatMovie</title>
  <link rel="stylesheet" href="../assets/styles/output.css">
</head>

<body>
  <header>
    <nav id="nav" aria-label="Main navigation">
      <ul>
        <li>
          <a href="/" class="breadcrumb">
            <i class="ci-House_01"></i>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-text">Home</span>
          </a>
        </li>
      </ul>
    </nav>

    <form action="pages/search.php" method="get" id="search-form" role="search" class="search-form" aria-label="Search form">
      <i class="icon icon-search"></i>
      <input type="text" name="search" id="search" placeholder="Search a movie" aria-label="Search for a movie">
      <label for="search" class="icon shortcut-search">⌘K</label>
    </form>

    <a href='signin.php' class="user" aria-label="Sign in">
      <span class="user-text">Sign in</span>
      <i class="ci-User_Circle"></i>
    </a>
  </header>
