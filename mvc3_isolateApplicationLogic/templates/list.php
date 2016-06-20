<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>List all posts</title>
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
<h1>List of Posts</h1>
<ul>
    <?php foreach($posts as $post): ?>
    <li>
        <a href="/show.php?id=<?= $post['id'] ?>">
            <?= $post['title'] ?>
        </a>
    </li>
    <?php endforeach ?>
</ul>
</body>
</html>
