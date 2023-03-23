<!DOCTYPE html>
<html>
    <head>
        <link type="stylesheet" href="./view/main.css"/>
    </head>
    <body>
        <?php include("./view/header.php") ?>
        
        <main>
            <h2>Vehicle Class List</h2>
            <table>
                <tr>
                    <th>Name</th>
                </tr>
                <?php foreach($classes as $class): ?>
                <tr>
                    <td><?php echo $class["class_name"] ?></td>
                    <td>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                            <input type="hidden" name="action" value="remove_class"/>
                            <input type="hidden" name="class_id" value="<?php echo $class["id"] ?>"/>
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>

            <h2>Add Vehicle Class</h2>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <label>Class Name:</label>
                <br/>
                <input type="text" name="class_name"></input>
                <br/>
                <button type="submit">Add Class</button>
                <input type="hidden" name="action" value="add_class"/>
            </form>
        </main>

        <?php include("./view/footer.php") ?>
    </body>
</html>