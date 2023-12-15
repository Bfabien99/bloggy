<?php
require_once('core/Post.php');
$Post = new Post();

$error = "";
$results = [];

if(!array_key_exists('slug', $_GET) || empty($_GET['slug'])){
    header('Location: /');
}

$slug = escapeString($_GET['slug']);
$result = $Post->getBySlug($slug);

if(isset($result['success'])){
    $singlePost = $result['success'];
    $Post->incrementPostViews($singlePost['id']);
    unset($result);
}

$result = $Post->getRecents(3, 1);
if(isset($result['success'])){
    $mostViewed = $result['success'];
    unset($result);
}

$result = $Post->getRecents( );
if(isset($result['success'])){
    $morePosts = $result['success'];
    unset($result);
}

require('views/single.php');