<?php

    require_once'database.php';

    class Note {
        private $conn;

        public function __construct() {
            $database = new Database();
            $db = $database->connect();
            $this->conn = $db;
        }
        
        public function runQuery($sql) {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        /**
         * The function is for inserting a new note by taking a title, content and due_date as parameters.
         * @param string $title
         * @param string $content
         * @param string $due_date
         * @return boolean
         */
        public function insert ($title, $content, $due_date) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO notes (title, content, due_date) VALUES (:title, :content, :due_date)");
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":content", $content);
                $stmt->bindparam(":due_date", $due_date);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    }

?>