<?php
// index.php

// ------------------
// connect to DB and get data
// ------------------

define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'blog_db');
define('DB_HOST', 'localhost');

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);

$result = $pdo->query('SELECT id, title FROM post');

require 'templates/list.php';

$pdo = null;