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
         * The function is for inserting a new note by taking a title, content, due_date and id as parameters.
         * @param string $title
         * @param string $content
         * @param string $due_date
         * @param int $id
         * @return boolean
         */
        public function insert ($title, $content, $due_date, $id) {
            try {
                $stmt = $this->conn->prepare("INSERT INTO notes (title, content, due_date, id) VALUES (:title, :content, :due_date, :id)");
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":content", $content);
                $stmt->bindparam(":due_date", $due_date);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        /**
         * The function is for updating a note by taking a title, content, due_date and id as parameters.
         * @param string $title
         * @param string $content
         * @param string $due_date
         * @param int $id
         * @return boolean
         */
        public function update ($title, $content, $due_date, $id) {
            try {
                $stmt = $this->conn->prepare("UPDATE notes SET title = :title, content = :content, due_date = :due_date WHERE id = :id");
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":content", $content);
                $stmt->bindparam(":due_date", $due_date);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        /**
         * The function is for deleting a note by taking an id as a parameter.
         * @param int $id
         * @return boolean
         */
        public function delete ($id) {
            try{
                $stmt = $this->conn->prepare("DELETE FROM notes WHERE id = :id");
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        


    }
?>