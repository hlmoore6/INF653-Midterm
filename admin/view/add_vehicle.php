<?php include("./view/header.php") ?>

<main>
    <h2>Add Vehicle</h2>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" class="add-vehicle">
        <div class="vehicle-param">
            <label>Make:</label>
            <select id="make_id" name="make_id">
                <?php foreach($makes as $make): ?>
                <option value="<?php echo $make["id"] ?>">
                    <?php echo $make["make_name"]?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <br/>

        <div class="vehicle-param">
            <label>Type:</label>
            <select id="type_id" name="type_id">
                <?php foreach($types as $type): ?>
                <option value="<?php echo $type["id"] ?>">
                    <?php echo $type["type_name"]?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <br/>

        <div class="vehicle-param">
            <label>Class:</label>
            <select id="class_id" name="class_id">
                <?php foreach($classes as $class): ?>
                <option value="<?php echo $class["id"] ?>">
                    <?php echo $class["class_name"]?>
                </option>
                <?php endforeach ?>
            </select>
        </div>

        <br/>

        <div class="vehicle-param">
            <label>Year: </label>
            <input type="text" name="year" class="name-input"></input>
        </div>

        <br/>

        <div class="vehicle-param">
            <label>Model: </label>
            <input type="text" name="model" class="name-input"></input>
        </div>

        <br/>

        <div class="vehicle-param">
            <label>Price: </label>
            <input type="text" name="price" class="name-input"></input>
        </div>

        <br/>

        <button type="submit" class="submit-button">Add Vehicle</button>
        <input type="hidden" name="action" value="add_vehicle"/>
    </form>
</main>

<?php include("./view/footer.php") ?>