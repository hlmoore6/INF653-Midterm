<?php 
    require_once(__DIR__ . "/database.php");

    require_once(__DIR__ . "/makes.php");
    require_once(__DIR__ . "/types.php");
    require_once(__DIR__ . "/classes.php");

    function get_vehicles() {
        global $database;

        $query = "SELECT vehicles.id, vehicles.year, vehicles.price, vehicles.model, " 
            . "makes.make_name, types.type_name, classes.class_name "
            . "FROM vehicles "
            . "LEFT JOIN makes ON vehicles.make_id = makes.id "
            . "LEFT JOIN types ON vehicles.type_id = types.id "
            . "LEFT JOIN classes ON vehicles.class_id = classes.id ";

        if (isset($_SESSION["current_make"]) || isset($_SESSION["current_type"]) || isset($_SESSION["current_class"])) {
            $query .= "WHERE ";
        }

        if (isset($_SESSION["current_make"])) {
            $query .= "vehicles.make_id = " . $_SESSION["current_make"] . " ";
        }

        if (isset($_SESSION["current_type"])) {
            if (isset($_SESSION["current_make"])) $query .= "AND ";

            $query .= "vehicles.type_id = " . $_SESSION["current_type"] . " ";
        }

        if (isset($_SESSION["current_class"])) {
            if (isset($_SESSION["current_make"]) || isset($_SESSION["current_type"])) $query .= "AND ";

            $query .= "vehicles.class_id = " . $_SESSION["current_class"] . " ";
        }

        if (isset($_SESSION["order_by"]) && ($_SESSION["order_by"] == "price" || $_SESSION["order_by"] == "year")) {
            $query .= "ORDER BY ";

            if ($_SESSION["order_by"] == "price") {
                $query .= "vehicles.price";
            }
            else {
                $query .= "vehicles.year";
            }
        }

        try {
            $statement = $database->prepare($query);           
            $statement->execute();

            $vehicles = $statement->fetchAll();
            $statement->closeCursor();

            return $vehicles;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    function remove_vehicle($vehicle_id) {
        global $database;

        $query = "DELETE FROM vehicles WHERE vehicles.id = $vehicle_id";

        try {
            $statement = $database->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function add_vehicle($make, $type, $class, $year, $model, $price) {
        global $database;

        $query = "INSERT INTO vehicles (make_id, type_id, class_id, year, model, price) VALUES (:make_id, :type_id, :class_id, :year, :model, :price)";
        try {
            $statement = $database->prepare($query);

            $statement->bindParam("make_id", $make);
            $statement->bindParam("type_id", $type);
            $statement->bindParam("class_id", $class);

            $statement->bindParam("year", $year);
            $statement->bindParam("model", $model);
            $statement->bindParam("price", $price);

            $statement->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>