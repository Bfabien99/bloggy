<?php
require_once('core/Post.php');
$errors = [];
$success = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Initialisations du Post
     $Post = new Post();
     $uploadOne = $uploadTwo = $uploadThree = null;

     if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['categories']) && !empty($_POST['tags'] && !empty($_FILES["picOne"]))) {
          // Récupérations des données postées
          $title = escapeString($_POST['title']);
          $content = escapeString($_POST['content']);
          $categories = escapeString($_POST['categories']);
          $tags = escapeString($_POST['tags']);

          // Ajout des données indispensable dans le Post
          $Post->setTitle($title);
          $Post->setSlug();
          $Post->setContent($content);
          $Post->setCategories($categories);
          $Post->setTags($tags);

          // Ajout des images dans le Post
          $uploadOne = uploadFile($_FILES["picOne"]);
          if (array_key_exists('success', $uploadOne)) {
               $Post->setPicture_one($uploadOne['name']);
               $resize = resizeImage('uploads/' . $uploadOne['name']);
          }else{
               $errors[] = "Error Pic1: ".$uploadOne['error'];
          }

          if (!empty($_FILES["picTwo"]['name'])) {
               $uploadTwo = uploadFile($_FILES["picTwo"]);
               if (array_key_exists('success', $uploadTwo)) {
                    $Post->setPicture_two($uploadTwo['name']);
                    $resize = resizeImage('uploads/' . $uploadTwo['name']);
               }else{
                    $errors[] = "Error Pic2: ".$uploadTwo['error'];;
               }
          }
          if (!empty($_FILES["picThree"]['name'])) {
               $uploadThree = uploadFile($_FILES["picThree"]);
               if (array_key_exists('success', $uploadThree)) {
                    $Post->setPicture_three($uploadThree['name']);
                    $resize = resizeImage('uploads/' . $uploadThree['name']);
               }else{
                    $errors[] = "Error Pic3: ".$uploadThree['error'];;
               }
          }

          // Insertion du Post dans la Base de Données
          if(empty($errors)){
               $result = $Post->add();
               if(!empty($result['success'])){
                    $success = "New Post created!";
               }else{
                    $errors = $result['error'];
               }   
          }
          

     } else {
          $errors[] = "FIll All Field!";
     }
     //var_dump($Post);
}
require('views/add.php');