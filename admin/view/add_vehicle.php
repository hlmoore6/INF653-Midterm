<!DOCTYPE html>
<html>
    <head>
        <link type="stylesheet" href="./view/main.css"/>
    </head>
    <body>
        <?php include("./view/header.php") ?>
        
        <main>
            <h2>Add Vehicle</h2>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <label>Make:</label>
                <select id="make_id" name="make_id">
                    <?php foreach($makes as $make): ?>
                    <option value="<?php echo $make["id"] ?>">
                        <?php echo $make["make_name"]?>
                    </option>
                    <?php endforeach ?>
                </select>

                <br/>

                <label>Type:</label>
                <select id="type_id" name="type_id">
                    <?php foreach($types as $type): ?>
                    <option value="<?php echo $type["id"] ?>">
                        <?php echo $type["type_name"]?>
                    </option>
                    <?php endforeach ?>
                </select>

                <br/>

                <label>Class:</label>
                <select id="class_id" name="class_id">
                    <?php foreach($classes as $class): ?>
                    <option value="<?php echo $class["id"] ?>">
                        <?php echo $class["class_name"]?>
                    </option>
                    <?php endforeach ?>
                </select>

                <br/>

                <label>Year: </label>
                <input type="text" name="year"></input>

                <br/>

                <label>Model: </label>
                <input type="text" name="model"></input>

                <br/>

                <label>Price: </label>
                <input type="text" name="price"></input>

                <br/>

                <button type="submit">Add Vehicle</button>
                <input type="hidden" name="action" value="add_vehicle"/>
            </form>
        </main>

        <?php include("./view/footer.php") ?>
    </body>
</html>