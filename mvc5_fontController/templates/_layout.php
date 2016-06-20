<?php
// templates/_layout.php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        @import "/css/blog.css";
    </style>
</head>

<body>
<header>welcome to the BLOG</header>

<nav>
    <ul>
        <li><a href="/index.php">Index (list)</a></li>
        <li><a href="/index.php/about">About</a></li>
    </ul>
</nav>

<!-- ************ page specific content ********** -->
<?= $content ?>

</body>
</html>
