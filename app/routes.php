<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->post('/account','AccountController:postCostumerAccount')->setName('post.account');

$app->get('/boxes/{accountId}', 'BoxController:getCustomerBoxes')->setName('boxes');

$app->post('/rating/{accountId}/{productId}','RatingController:postCostumerRating')->setName('post.rating');