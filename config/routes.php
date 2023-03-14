<?php

use \Phalcon\Mvc\Micro\Collection;

$feedCollection = new Collection();
$feedCollection->setHandler('\Api\Controllers\FeedPostController', true);
$feedCollection->post('/create', 'createPost');
$feedCollection->get('/get/{postId:[0-9]+}', 'getPost');
$feedCollection->put('/update', 'updatePost');
$feedCollection->delete('/delete/{postId:[0-9]+}', 'deletePost');
$feedCollection->get('/list/{channel}', 'getFeed');

$app->mount($feedCollection);