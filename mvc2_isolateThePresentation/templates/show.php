<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Show one post</title>
    <style>
        @import "/css/blog.css";
    </style>
</head>

<header>welcome to the BLOG</header>

<nav>
    <ul>
        <li><a href="index.php">Index (list)</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</nav>

<!-- ************ page specific content ********** -->
<h1><?= $post['title'] ?></h1>

<div class="date"><?= $post['created_at'] ?></div>
<div class="body">
    <?= $post['body'] ?>
</div>

</body>
</html>

<?php
$pdo = null;