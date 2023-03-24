
<?php
    require_once(__DIR__ . "/../../model/vehicles.php");

    if($method == "POST") {
        switch($action) {
            case "add_vehicle":
                $make_id = filter_input(INPUT_POST, "make_id", FILTER_VALIDATE_INT);
                $type_id = filter_input(INPUT_POST, "type_id", FILTER_VALIDATE_INT);
                $class_id = filter_input(INPUT_POST, "class_id", FILTER_VALIDATE_INT);

                $year = filter_input(INPUT_POST, "year", FILTER_VALIDATE_INT);
                $model = filter_input(INPUT_POST, "model", FILTER_UNSAFE_RAW);
                $price = filter_input(INPUT_POST, "price", FILTER_UNSAFE_RAW);

                add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);

                header("Location: .");
                break;
        }
    } else {
        switch ($action) {
            case "add_vehicle":
                include("./view/add_vehicle.php");
                break;
        }
    }

?>