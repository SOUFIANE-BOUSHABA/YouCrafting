<?php
class Articlee {
    public $id;
    public $titre;
    public $contenu;
    public $date_de_creation;
    public $user_id;


    

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addArticle($titre,$contenu,$user_id) {
        $query = "INSERT INTO Article (titre, contenu, date_de_creation, user_id) VALUES (?, ?, NOW(), ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$titre,$contenu,$user_id]);
    }

    public function getArticles() {
        session_start();
        $id=$_SESSION['idUser'];
        $query = "SELECT * FROM Article where user_id = $id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateArticle($article_id,$nouveau_titre,$nouveau_contenu) {
        $query = "UPDATE Article SET titre = ?, contenu = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$nouveau_titre,$nouveau_contenu,$article_id]);
    }

    public function deleteArticle($articleId) {
        $query = "DELETE FROM Article WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$articleId]);
    }
}

?>
