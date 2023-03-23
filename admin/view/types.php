<!DOCTYPE html>
<html>
    <head>
        <link type="stylesheet" href="./view/main.css"/>
    </head>
    <body>
        <?php include("./view/header.php") ?>
        
        <main>
            <h2>Vehicle Type List</h2>
            <table>
                <tr>
                    <th>Name</th>
                </tr>
                <?php foreach($types as $type): ?>
                <tr>
                    <td><?php echo $type["type_name"] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                            <input type="hidden" name="action" value="remove_type"/>
                            <input type="hidden" name="type_id" value="<?php echo $type["id"] ?>"/>
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>

            <h2>Add Vehicle Type</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <label>Type Name:</label>
                <br/>
                <input type="text" name="type_name"></input>
                <br/>
                <button type="submit">Add Type</button>
                <input type="hidden" name="action" value="add_type"/>
            </form>
        </main>

        <?php include("./view/footer.php") ?>
    </body>
</html>