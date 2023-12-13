<?php
include 'db.php';
include 'article.php';
session_start();
$db = new DB();
$articleManager = new Articlee($db->connect());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article = new Articlee($db->connect());
    $article->titre = $_POST['titre'];
    $article->contenu = $_POST['contenu'];
    $article->user_id = $_SESSION['idUser'];

    $articleManager->addArticle($article);

    header('Content-Type: application/json');
   
    exit;
}
?>
