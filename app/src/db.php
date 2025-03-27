<?php

// Path: app/src/db.php
// connect to the database

$pdo = new PDO("mysql:host=db;dbname=whatmovie", 'whatmovie', 'mypassword');
