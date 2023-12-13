<?php
include 'db.php';
include 'article.php';

$db = new DB();
$articleManager = new Articlee($db->connect());
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$articleId = $_POST['delet'];
$articleManager->deleteArticle($articleId);

}
?>
