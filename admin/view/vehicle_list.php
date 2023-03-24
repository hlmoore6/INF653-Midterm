<?php include("./view/header.php") ?>

<main>
    <?php if(!isset($vehicles, $makes, $types, $classes)): ?>
        <h2>An error has occurred</h2>
        <p>Unable to retrieve some or all information from the database</p>
    <?php else: ?>
    <?php include("../view/filters.php"); ?>
    <div class="vehicle-list-container">
        <table class="vehicle-list" cellspacing="0">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody> 
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
                            <button type="submit" class="remove-button">Remove</button>
                            <input type="hidden" name="vehicle_id" value="<?php echo $v["id"] ?>"/>
                            <input type="hidden" name="action" value="remove_vehicle"/>
                        </form> 
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php endif ?>
</main>

<?php include("./view/footer.php") ?>