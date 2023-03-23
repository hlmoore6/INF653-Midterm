<?php
    if ($method == "POST") {
        switch($action) {
            case "add_make":
                $make_name = filter_input(INPUT_POST, "make_name", FILTER_UNSAFE_RAW);
                add_make($make_name);
                header("Location: .");
                break;

            case "remove_make":
                $make_id = filter_input(INPUT_POST, "make_id", FILTER_VALIDATE_INT);
                remove_make($make_id);
                header("Location: .");
                break;
        }
    } else {
        switch($action) {
            case "edit_makes":
                include("./view/makes.php");
                break;
        }
    }
?>