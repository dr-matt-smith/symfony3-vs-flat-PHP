<?php
// index.php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$pathToTemplates = 'templates';
$loader = new Twig_Loader_Filesystem($pathToTemplates);
$twig = new Twig_Environment($loader);

$response = new Response();
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

switch($uri){
    case '/':
        $response = list_action($twig);
        break;

    case '/about':
        $response = about_action($twig);
        break;

    case '/show':
        if($request->query->has('id')) {
            $id = $request->query->get('id');
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            $response = show_action($twig, $id);
        } else {
            $html = '<html><body><h1>Missing ID for show route</h1></body></html>';
            $response = new Response($html, Response::HTTP_NOT_FOUND);
        }
        break;

    default:
        $html = '<html><body><h1>Page Not Found</h1></body></html>';
        $response = new Response($html, Response::HTTP_NOT_FOUND);
}

// echo the headers and send the response
$response->send();