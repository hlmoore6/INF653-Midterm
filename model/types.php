<?php
    require_once(__DIR__ . "/database.php");

    function set_current_type($t) {
        $_SESSION["current_type"] = $t;
    }

    function get_types() {
        global $database;

        $query = "SELECT * FROM types";

        try {
            $statement = $database->prepare($query);
            $statement->execute();

            $types = $statement->fetchAll();
            $statement->closeCursor();

            return $types;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function add_type($type_name) {
        global $database;

        $query = "INSERT INTO types (type_name) VALUES (:type_name)";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("type_name", $type_name);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function remove_type($type_id) {
        global $database;

        $query = "DELETE FROM types WHERE id = :type_id";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("type_id", $type_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>