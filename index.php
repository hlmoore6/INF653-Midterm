<?php
    require_once("./model/vehicles.php");
    require_once("./model/makes.php");
    require_once("./model/types.php");
    require_once("./model/classes.php");

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

        default: 
            include("./view/vehicle_list.php");
            break;
    }

    function init_session() {
        if(!isset($_SESSION["current_make"])) $_SESSION["current_make"] = null;
        if(!isset($_SESSION["current_type"])) $_SESSION["current_type"] = null;
        if(!isset($_SESSION["current_class"])) $_SESSION["current_class"] = null;
        if(!isset($_SESSION["order_by"])) $_SESSION["order_by"] = "year";
    }
?>
