<?php
// index.php

require_once 'vendor/autoload.php';

// - see composer.json - these 2 files are now being autoloaded!
//require_once 'model.php';
//require_once 'controllers.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$uri = $request->getPathInfo();

switch($uri){
    case '/':
        list_action();
        break;

    case '/about':
        about_action();
        break;

    case '/show':
        if($request->query->has('id')) {
            $id = $request->query->get('id');
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
            show_action($id);
        } else {
            print '<html><body><h1>Missing ID for show route</h1></body></html>';
        }
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        print '<html><body><h1>Page Not Found</h1></body></html>';
}