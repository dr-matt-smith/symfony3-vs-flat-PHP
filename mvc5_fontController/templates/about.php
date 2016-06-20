<?php
// templates/about.php
?>

<?php $title = 'About' ?>

<?php ob_start() ?>
<h1>About</h1>
<p>
    I am the about page
</p>
<?php $content = ob_get_clean() ?>

<?php include '_layout.php' ?>
