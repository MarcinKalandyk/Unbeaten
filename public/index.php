<?php

require '../Routing.php';

session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('register', 'SecurityController');

if (!empty($_SESSION['user'])) {
    Router::get('logout', 'SecurityController');
    Router::get('events', 'EventController');
    Router::get('addEvent', 'EventController');
    Router::post('search', 'EventController');
    Router::post('details', 'EventController');
    Router::get('join', 'EventController');
    Router::get('withdraw', 'EventController');
    Router::get('delete', 'EventController');
}

Router::run($path);