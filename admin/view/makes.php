<!DOCTYPE html>
<html>
    <head>
        <link type="stylesheet" href="./view/main.css"/>
    </head>
    <body>
        <?php include("./view/header.php") ?>
        
        <main>
            <h2>Vehicle Make List</h2>
            <table>
                <tr>
                    <th>Name</th>
                </tr>
                <?php foreach($makes as $make): ?>
                <tr>
                    <td><?php echo $make["make_name"] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                            <input type="hidden" name="action" value="remove_make"/>
                            <input type="hidden" name="make_id" value="<?php echo $make["id"] ?>"/>
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>

            <h2>Add Vehicle Make</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <label>Make Name:</label>
                <br/>
                <input type="text" name="make_name"></input>
                <br/>
                <button type="submit">Add Make</button>
                <input type="hidden" name="action" value="add_make"/>
            </form>
        </main>

        <?php include("./view/footer.php") ?>
    </body>
</html>