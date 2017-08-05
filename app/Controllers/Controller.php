<?php

namespace Graze\Controllers;

class Controller
{
   protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}