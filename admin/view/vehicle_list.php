<!DOCTYPE html>
<html>
    <head>
        <link type="stylesheet" href="./view/main.css"/>
    </head>
    <body>
        <?php include("./view/header.php") ?>
        
        <main>
            <?php if(!isset($vehicles, $makes, $types, $classes)): ?>
                <h2>An error has occurred</h2>
                <p>Unable to retrieve some or all information from the database</p>
            <?php else: ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <div>
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

                <div>
                    Sort By: 
                    <span>
                        <label for="year">Year</label>
                        <input type="radio" id="year" name="sort_by" value="year" <?php if($_SESSION["order_by"] == "year") echo "checked" ?>/>
                    </span>
                    <span>
                        <label for="price">Price</label>
                        <input type="radio" id="price" name="sort_by" value="price" <?php if($_SESSION["order_by"] == "price") echo "checked" ?>/>
                    </span>
                    <button type="submit">Submit</button>
                </div>

                <input type="hidden" name="action" value="vehicle_list_filter"/>
            </form>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
                <?php foreach($vehicles as $v): ?>
                    <tr>
                        <td><?php echo $v["year"] ?></td>
                        <td><?php echo $v["make_name"] ?></td>
                        <td><?php echo $v["model"] ?></td>
                        <td><?php echo $v["type_name"] ?></td>
                        <td><?php echo $v["class_name"] ?></td>
                        <td>$<?php echo number_format($v["price"]) ?></td>
                        <td>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST"> 
                                <button type="submit">Remove</button>
                                <input type="hidden" name="vehicle_id" value="<?php echo $v["id"] ?>"/>
                                <input type="hidden" name="action" value="remove_vehicle"/>
                            </form> 
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <?php endif ?>
        </main>

        <?php include("./view/footer.php") ?>
    </body>
</html>