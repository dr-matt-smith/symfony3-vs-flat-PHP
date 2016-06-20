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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>List all Posts</title>
</head>

<body>
<h1>List of Posts</h1>
<ul>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <li>
        <a href="/show.php?id=<?= $row['id'] ?>">
            <?= $row['title'] ?>
        </a>
    </li>
    <?php endwhile ?>
</ul>
</body>
</html>

<?php
$pdo = null;