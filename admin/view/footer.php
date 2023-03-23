<?php

?>

<footer>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <button type="submit">View Full Vehicle List</button>
        <input type="hidden" name="action" value="vehicle_list">
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <button type="submit">Add Vehicle</button>
        <input type="hidden" name="action" value="add_vehicle">
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <button type="submit">View/Edit Makes</button>
        <input type="hidden" name="action" value="edit_makes">
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <button type="submit">View/Edit Types</button>
        <input type="hidden" name="action" value="edit_types">
    </form>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
        <button type="submit">View/Edit Classes</button>
        <input type="hidden" name="action" value="edit_classes">
    </form>
</footer>