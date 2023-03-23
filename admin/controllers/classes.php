<?php
    if ($method == "POST") {
        switch($action) {
            case "add_class":
                $make_name = filter_input(INPUT_POST, "class_name", FILTER_UNSAFE_RAW);
                add_class($make_name);
                header("Location: .");
                break;

            case "remove_class":
                $make_id = filter_input(INPUT_POST, "class_id", FILTER_VALIDATE_INT);
                remove_class($make_id);
                header("Location: .");
                break;
        }
    } else {
        switch($action) {
            case "edit_classes":
                include("./view/classes.php");
                break;
        }
    }
?>