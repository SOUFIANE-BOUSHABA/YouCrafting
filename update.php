<?php
include 'db.php';
include 'article.php';
include 'art.php';

$db = new DB();
$articleManager = new Articlee($db->connect());

$article = new Articlee($db->connect());
$article->id = $_POST['article_id'];
$article->titre = $_POST['nouveau_titre'];
$article->contenu = $_POST['nouveau_contenu'];

$articleManager->updateArticle($article);

header("Location: index.php");
?>
