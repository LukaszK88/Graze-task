<?php

namespace Graze\Controllers;

use Graze\Models\Box;

class BoxController extends Controller
{
    protected $box;

    public function __construct($container)
    {
        parent::__construct($container);
        $this->box = new Box();
    }

    public function getCustomerBoxes($request, $response, $accountId)
    {
        $boxes = $this->box->getBoxes($accountId);

        return $this->container->view->render($response, 'boxes.twig',[
            'boxes' => $boxes
        ]);
    }

}