<?php
    require_once(__DIR__ . "/database.php");

    function set_current_class($c) {
        $_SESSION["current_class"] = $c;
    }

    function get_classes() {
        global $database;

        $query = "SELECT * FROM classes";

        try {
            $statement = $database->prepare($query);
            $statement->execute();

            $classes = $statement->fetchAll();
            $statement->closeCursor();

            return $classes;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function add_class($class_name) {
        global $database;

        $query = "INSERT INTO classes (class_name) VALUES (:class_name)";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("class_name", $class_name);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function remove_class($class_id) {
        global $database;

        $query = "DELETE FROM classes WHERE id = :class_id";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("class_id", $class_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>