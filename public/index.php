<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';

use New\Core\{
    Request,
    Router
};

$uri = parse_url(substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1), PHP_URL_PATH);
$uri = explode('/', $uri);

$controller = array_shift($uri) ?? DEFAULT_CONTROLLER;
$action = array_shift($uri) ?? DEFAULT_ACTION;
$params = $uri ?? [];

(new Router(new Request()))->run();

