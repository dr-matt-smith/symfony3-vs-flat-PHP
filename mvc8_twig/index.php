<?php
// index.php

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
$pathToTemplates = 'templates';
$loader = new Twig_Loader_Filesystem($pathToTemplates);
$twig = new Twig_Environment($loader);

$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

switch($uri){
    case '/':
        list_action($twig);
        break;

    case '/about':
        about_action($twig);
        break;

    case '/show':
        if($request->query->has('id')) {
            $id = $request->query->get('id');
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            show_action($twig, $id);
        } else {
            print '<html><body><h1>Missing ID for show route</h1></body></html>';
        }
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        print '<html><body><h1>Page Not Found</h1></body></html>';
}