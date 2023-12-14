<?php
require_once('core/Post.php');
$Post = new Post();

$error = "";
$results = [];

$result = $Post->getAll();
if(!empty($result['success'])){
    $results = $result['success'];
    unset($result);
}
require('views/category.php');