<?php

namespace Graze\Controllers;

use Graze\Models\Rating;

class RatingController extends Controller
{
    protected $rating;

    public function __construct($container)
    {
        parent::__construct($container);
        $this->rating = new Rating();
    }

    public function postCostumerRating($request, $response, $params)
    {
        $rating['rating'] = (int)$request->getParam('rating');
        $rating['account_id'] = (int)$params['accountId'];
        $rating['product_id'] = (int)$params['productId'];

        $newRatingRecord = Rating::where(Rating::COL_ACCOUNT_ID,$rating[Rating::COL_ACCOUNT_ID])
            ->where(Rating::COL_PRODUCT_ID,$rating[Rating::COL_PRODUCT_ID])
            ->update([Rating::COL_RATING => $rating[Rating::COL_RATING]]);

        if(!$newRatingRecord) $this->container->flash->addMessage('info','Couldn\'t update rating');

        $this->container->flash->addMessage('info','Rating updated');

        return $response->withRedirect($this->container->router->pathFor('boxes',['accountId' => $rating['account_id']]));
    }

}