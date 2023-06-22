<?php

declare(strict_types=1);

namespace New\Core;

class Request
{
    public string $controller;
    public string $action;
    public array $params;

    public function __construct()
    {
        $this->defineRequest();
    }

    private function defineRequest()
    {
        $uri = $this->getUri();
        $this->setController(array_shift($uri));
        $this->setAction(array_shift($uri));
        $this->setParams($uri);
    }

    private function getUri(): array
    {
        $uri = parse_url(substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1), PHP_URL_PATH);
        return explode('/', $uri);
    }

    public function getController(): string
    {
        return $this->controller;
    }

    private function setController(?string $controller)
    {
        $this->controller = 'New\\Controller\\' .
            (empty($controller)
                ? DEFAULT_CONTROLLER
                : ucfirst($controller) . 'Controller'
            );
    }

    public function getAction(): string
    {
        return $this->action;
    }

    private function setAction(?string $action)
    {
        $this->action = $action ?? DEFAULT_ACTION;
    }

    public function getParams(): array|string|int
    {
        return $this->params;
    }

    private function setParams($params)
    {
        $this->params = $params;
    }
}
