<?php
// controllers.php

function list_action(Twig_Environment $twig)
{
    $posts = get_all_posts();
    $args = [
        'posts' => $posts
    ];
    $template = 'list';
    print $twig->render($template . '.html.twig', $args);
}

function show_action(Twig_Environment $twig, $id)
{
    $post = get_one_post_by_id($id);
    $args = [
        'post' => $post
    ];
    $template = 'show';
    print $twig->render($template . '.html.twig', $args);
}

function about_action(Twig_Environment $twig)
{
    $args = [];
    $template = 'about';
    print $twig->render($template . '.html.twig', $args);
}