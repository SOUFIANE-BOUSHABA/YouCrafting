<?php  


class user{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    
    public function Registre($firstname,$lastname,$username,$password,$email, $role_id){
        $query = "INSERT INTO utilisateur (`firstname`, `lastname`, `username`, `password`, `email`, `role_id`) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$firstname,$lastname,$username,$password,$email, $role_id]);
        return true;
    }

    public function Login($email,$password){
       
        $stmt=$this->db->prepare("SELECT * FROM utilisateur WHERE username=? AND password=?");
        $result=$stmt->execute([$email,$password]);
        $numRows = $stmt->rowCount();
        if($result && $numRows>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
}