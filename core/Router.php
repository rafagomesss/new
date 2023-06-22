<?php

declare(strict_types=1);

namespace New\Core;

class Router
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        try {
            $class =  new \ReflectionClass($this->request->getController());
            echo '<pre>' . print_r($class, true) . '</pre>';
            exit();
        } catch (\Throwable $th) {
            echo $th->__toString();
        }
    }


}