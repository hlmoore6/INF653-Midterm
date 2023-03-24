<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="vehicle-filter">
    <div class="filters">
        <select name="make_id">
            <option value="all" <?php if(!isset($_SESSION)) echo "selected" ?>>
                View All Makes
            </option>
            <?php foreach($makes as $make): ?>
                <option value="<?php echo $make["id"] ?>" <?php if($_SESSION["current_make"] == $make["id"]) echo "selected" ?>>
                    <?php echo $make["make_name"] ?>
                </option>
            <?php endforeach ?>
        </select>
        <select name="type_id">
            <option value="all" <?php if(!isset($_SESSION)) echo "selected" ?>>
                View All Types
            </option>
            <?php foreach($types as $type): ?>
                <option value="<?php echo $type["id"] ?>" <?php if($_SESSION["current_type"] == $type["id"]) echo "selected" ?>>
                    <?php echo $type["type_name"] ?>
                </option>
            <?php endforeach ?>
        </select>
        <select name="class_id">
            <option value="all" <?php if(!isset($_SESSION)) echo "selected" ?>>
                View All Classes 
            </option>
            <?php foreach($classes as $class): ?>
                <option value="<?php echo $class["id"] ?>" <?php if($_SESSION["current_class"] == $class["id"]) echo "selected" ?>>
                    <?php echo $class["class_name"] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="sort-filter">
        Sort By: 
        <span>
            <label for="year">Year</label>
            <input type="radio" id="year" name="sort_by" value="year" <?php if($_SESSION["order_by"] == "year") echo "checked" ?>/>
        </span>
        <span>
            <label for="price">Price</label>
            <input type="radio" id="price" name="sort_by" value="price" <?php if($_SESSION["order_by"] == "price") echo "checked" ?>/>
        </span>
    </div>

    <div>
        <button type="submit" class="submit-button">Submit</button>
    </div>

    <input type="hidden" name="action" value="vehicle_list_filter"/>
</form>