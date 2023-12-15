<?php
require_once('core/Post.php');
$Post = new Post();

$error = "";
$results = [];

$itemsPerPage = 5; // Nombre d'éléments par page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle

if(!is_numeric($currentPage) || $currentPage <= 0){
    $currentPage = 1;
}
$offset = ($currentPage - 1) * $itemsPerPage;
$search = isset($_GET['q']) ? strip_tags($_GET['q']) : '';

if(strlen($search) == 0){
    header('Location: /');
    exit;
}
$result = $Post->search($search, $itemsPerPage, $offset);
if(isset($result['success'])){
    $results = $result['success'];
    unset($result);
}

$result = $Post->getAllSearch($search);
if(isset($result['success'])){
    $alls = $result['success'];
    unset($result);
}

$result = $Post->getRecents(3, 1);
if(isset($result['success'])){
    $mostViewed = $result['success'];
    unset($result);
}

$totalItems = count($alls); // Nombre total d'éléments
$url = '/search?q='.$search.'&';
require('views/search-result.php');
