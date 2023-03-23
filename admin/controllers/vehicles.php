<?php
    require_once(__DIR__ . "/../../model/vehicles.php");

    if($method == "POST") {
        switch($action) {
            case "vehicle_list_filter":
                $mn = filter_input(INPUT_POST, "make_id", FILTER_UNSAFE_RAW);
                $tn = filter_input(INPUT_POST, "type_id", FILTER_UNSAFE_RAW);
                $cn = filter_input(INPUT_POST, "class_id", FILTER_UNSAFE_RAW);
                
                $_SESSION["current_make"] = $mn == "all" ? null: $mn;
                $_SESSION["current_type"] = $tn == "all" ? null: $tn;
                $_SESSION["current_class"] = $cn == "all" ? null: $cn;

                $ob = filter_input(INPUT_POST, "sort_by", FILTER_UNSAFE_RAW);
                $_SESSION["order_by"] = $ob;
                header("Location: .");
                break;

            case "remove_vehicle":
                $vehicle_id = filter_input(INPUT_POST, "vehicle_id", FILTER_VALIDATE_INT);
                remove_vehicle($vehicle_id);
                header("Location: .");
                break;

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

            default:
                include("./view/vehicle_list.php");
                break;
        }
    } else {
        switch ($action) {
            case "add_vehicle":
                include("./view/add_vehicle.php");
                break;

            default:
                include("./view/vehicle_list.php");
                break;
        }
    }

?>