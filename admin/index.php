<?php 
    require_once(__DIR__ . "/../model/makes.php");
    require_once(__DIR__ . "/../model/types.php");
    require_once(__DIR__ . "/../model/classes.php");

    require_once(__DIR__ . "/../model/vehicles.php");

    $method = "POST";
    $action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);
    if ($action == null) {
        $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);
        $method = "GET";
    }

    session_start();
    init_session();

    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();

    $vehicles = get_vehicles();

    switch($action) {

        case "edit_makes":
        case "add_make":
        case "remove_make":
            $current_page = "makes";
            include("./controllers/makes.php");
            break;

        case "edit_types":
        case "add_type":
        case "remove_type":
            $current_page = "types";
            include("./controllers/types.php");
            break;

        case "edit_classes":
        case "add_class":
        case "remove_class":
            $current_page = "classes";
            include("./controllers/classes.php");
            break;

        case "add_vehicle":
            $current_page = "add_vehicle";
            include("./controllers/add_vehicle.php");
            break;

        case "vehicle_list_filter":
        case "remove_vehicle":
        case "vehicle_list":
        default: 
            $current_page = "list_vehicle";
            include("./controllers/vehicles.php");
            break;
    }

    function init_session() {
        if(!isset($_SESSION["current_make"])) $_SESSION["current_make"] = null;
        if(!isset($_SESSION["current_type"])) $_SESSION["current_type"] = null;
        if(!isset($_SESSION["current_class"])) $_SESSION["current_class"] = null;
        if(!isset($_SESSION["order_by"])) $_SESSION["order_by"] = "year";
    }
?>