<?php
include 'article.php';

$articleManager = new Articlee();


    $article = new Articlee();
    $article->titre = $_POST['titre'];
    $article->contenu = $_POST['contenu'];
    $article->user_id = 1;

    $articleManager->addArticle($article);

    header('location:index.php');
   
?>
