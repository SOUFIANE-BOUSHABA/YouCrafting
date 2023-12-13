<?php
class DB {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'article';

    public function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->database";
        return new PDO($dsn, $this->username, $this->password);
    }
}
?>
