<?php

namespace Graze\Controllers;

class HomeController extends Controller
{

    public function index($request, $response)
    {
        return $this->container->view->render($response, 'app.twig');
    }
}