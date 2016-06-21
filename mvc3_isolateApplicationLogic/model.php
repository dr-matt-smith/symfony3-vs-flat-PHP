<?php
// model.php

define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'blog_db');
define('DB_HOST', 'localhost');

/**
 * create connection to blog DB
 * @return PDO
 */
function open_database_connection()
{
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    
    return $pdo;
}

function close_database_connection(&$pdo)
{
    $pdo = null;
}

function get_all_posts()
{
    $pdo = open_database_connection();

    $result = $pdo->query('SELECT id, title FROM post');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    close_database_connection($pdo);

    return $posts;
}

function get_one_post_by_id($id)
{
    $pdo = open_database_connection();

    // retrieve blog post record for 'id'
    $query = 'SELECT created_at, title, body FROM post WHERE id=:id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $post = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($pdo);

    return $post;
}
