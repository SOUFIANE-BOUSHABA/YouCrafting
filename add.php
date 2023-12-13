<?php
include 'db.php';
include 'article.php';
session_start();
$db = new DB();
$articleManager = new Articlee($db->connect());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $user_id = $_SESSION['idUser'];

    $articleManager->addArticle($titre,$contenu,$user_id);

    header('Content-Type: application/json');
   
    exit;
}
?>
