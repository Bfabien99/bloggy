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

if(!empty($result['success'])){
    $singlePost = $result['success'];
    unset($result);
}

require('views/single.php');