<?php
// show.php

// ------------------
// connect to DB and get data
// ------------------

define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'blog_db');
define('DB_HOST', 'localhost');

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);

// get 'id' from GET parameters
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// retrieve blog post record for 'id'
$query = 'SELECT created_at, title, body FROM post WHERE id=:id';
$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();

$post = $statement->fetch();

require 'templates/show.php';

$pdo = null;