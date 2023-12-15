<?php
require_once('core/Post.php');
$Post = new Post();

$error = "";
$results = [];

$itemsPerPage = 5; // Nombre d'éléments par page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle
$offset = ($currentPage - 1) * $itemsPerPage;

$result = $Post->paginate($itemsPerPage, $offset);
if(isset($result['success'])){
    $results = $result['success'];
    unset($result);
}

$result = $Post->getAll();
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
$url = '/category?';

require('views/category.php');