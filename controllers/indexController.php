<?php
require_once('core/Post.php');
$Post = new Post();

$error = "";
$allPosts = [];


// Récupération de tous les Posts
$result = $Post->getRecents(5);
if(!empty($result['success'])){
    $allPosts = $result['success'];
    unset($result);
}

// Récupération des Posts récents
$result = $Post->getRecents();
if(!empty($result['success'])){
    $recentsPosts = $result['success'];
    unset($result);
}


require('views/index.php');