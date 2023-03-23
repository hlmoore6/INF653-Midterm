<?php
    if ($method == "POST") {
        switch($action) {
            case "add_type":
                $type_name = filter_input(INPUT_POST, "make_name", FILTER_UNSAFE_RAW);
                add_type($type_name);
                header("Location: .");
                break;

            case "remove_type":
                $type_id = filter_input(INPUT_POST, "make_id", FILTER_VALIDATE_INT);
                remove_type($type_id);
                header("Location: .");
                break;
        }
    } else {
        switch($action) {
            case "edit_types":
                include("./view/types.php");
                break;
        }
    }
?>