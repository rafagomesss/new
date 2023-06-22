<?php

declare(strict_types=1);

namespace New\Controller;

class HomeController
{
    public function index()
    {
        echo 'Home: index';
    }

    public function editar(int $id)
    {
        echo $id;
    }
}