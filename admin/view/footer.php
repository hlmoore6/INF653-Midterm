        <footer>
            <?php if($current_page != "list_vehicle"): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <button type="submit" class="button-link">View Full Vehicle List</button>
                <input type="hidden" name="action" value="vehicle_list">
            </form>
            <?php endif ?>

            <?php if($current_page != "add_vehicle"): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <button type="submit" class="button-link">Add Vehicle</button>
                <input type="hidden" name="action" value="add_vehicle">
            </form>
            <?php endif ?>

            <?php if($current_page != "makes"): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <button type="submit" class="button-link">View/Edit Makes</button>
                <input type="hidden" name="action" value="edit_makes">
            </form>
            <?php endif ?>

            <?php if($current_page != "types"): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <button type="submit" class="button-link">View/Edit Types</button>
                <input type="hidden" name="action" value="edit_types">
            </form>
            <?php endif ?>

            <?php if($current_page != "classes"): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="GET">
                <button type="submit" class="button-link">View/Edit Classes</button>
                <input type="hidden" name="action" value="edit_classes">
            </form>
            <?php endif ?>
        </footer>
    </body>
</html>