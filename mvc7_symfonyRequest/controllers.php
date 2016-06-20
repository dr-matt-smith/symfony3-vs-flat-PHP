<?php
// controllers.php

function list_action()
{
    $posts = get_all_posts();
    require 'templates/list.php';
}

function show_action($id)
{
    $post = get_one_post_by_id($id);
    require 'templates/show.php';
}

function about_action()
{
    require __DIR__ . '/templates/about.php';
}