<?php

    require_once'database.php';

    class Note {
        private $conn;

        public function __construct() {
            $database = new Database();
            $db = $database->connect();
            $this->conn = $db;
        }
        

    }

?>