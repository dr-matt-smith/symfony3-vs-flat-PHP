<?php
// index.php

require_once 'model.php';
require_once 'controllers.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($uri){
    case '/':
        list_action();
        break;

    case '/about':
        about_action();
        break;

    case '/show':
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if(isset($_GET['id'])) {
            show_action($id);
        } else {
            print '<html><body><h1>Missing ID for show route</h1></body></html>';
        }
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        print '<html><body><h1>Page Not Found</h1></body></html>';
}
