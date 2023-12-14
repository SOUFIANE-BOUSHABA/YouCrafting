<?php
include 'db.php';
include 'article.php';
include 'art.php';

$db = new DB();
$articleManager = new Articlee($db->connect());

extract($_POST);

$articleManager->updateArticle($article_id,$nouveau_titre,$nouveau_contenu);

header("Location: index.php");
?>
