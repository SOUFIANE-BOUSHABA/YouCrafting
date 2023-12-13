<?php
include 'article.php';
session_start();
$articleManager = new Articlee();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = new Articlee();
    $article->titre = $_POST['titre'];
    $article->contenu = $_POST['contenu'];
    $article->user_id = $_SESSION['idUser'];

    $articleManager->addArticle($article);

    header('Content-Type: application/json');
   
    exit;
}
?>
