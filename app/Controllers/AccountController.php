<?php

namespace Graze\Controllers;

use Graze\Models\Account;

class AccountController extends Controller
{

    public function postCostumerAccount($request, $response)
    {
        $accountId = $request->getParam('accountId');

        $validAccount = Account::find($accountId);

        if(!$validAccount) {

            $this->container->flash->addMessage('info','Account doesn\'t exist');

            return $response->withRedirect($this->container->router->pathFor('home'));
        }

        return $response->withRedirect($this->container->router->pathFor('boxes',['accountId' => $validAccount->id]));
    }

}