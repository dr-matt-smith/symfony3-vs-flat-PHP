<?php
// controllers.php

use Symfony\Component\HttpFoundation\Response;


function list_action(Twig_Environment $twig):Response
{
    $posts = get_all_posts();
    $args = [
        'posts' => $posts
    ];
    $template = 'list';
    $html = $twig->render($template . '.html.twig', $args);
    return new Response($html);
}

function show_action(Twig_Environment $twig, $id):Response
{
    $post = get_one_post_by_id($id);
    $args = [
        'post' => $post
    ];
    $template = 'show';
    $html = $twig->render($template . '.html.twig', $args);
    return new Response($html);
}

function about_action(Twig_Environment $twig):Response
{
    $args = [];
    $template = 'about';
    $html = $twig->render($template . '.html.twig', $args);
    return new Response($html);
}