<?php
    require_once(__DIR__ . "/database.php");

    function set_current_make($m) {
        $_SESSION["current_make"] = $m;
    }

    function get_makes() {
        global $database;

        $query = "SELECT * FROM makes";

        try {
            $statement = $database->prepare($query);
            $statement->execute();

            $makes = $statement->fetchAll();
            $statement->closeCursor();

            return $makes;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function add_make($make_name) {
        global $database;

        $query = "INSERT INTO makes (make_name) VALUES (:make_name)";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("make_name", $make_name);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function remove_make($make_id) {
        global $database;

        $query = "DELETE FROM makes WHERE id = :make_id";

        try {
            $statement = $database->prepare($query);
            $statement->bindParam("make_id", $make_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>