<?php include("./view/header.php") ?>

<main>
    <h2>Vehicle Class List</h2>
    <table class="edit-category">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($classes as $class): ?>
            <tr>
                <td><?php echo $class["class_name"] ?></td>
                <td>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <input type="hidden" name="action" value="remove_class"/>
                        <input type="hidden" name="class_id" value="<?php echo $class["id"] ?>"/>
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <h2>Add Vehicle Class</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="add-category">
        <label>Class Name:</label>
        <br/>
        <input type="text" name="class-name" class="name-input"></input>
        <br/>
        <button type="submit" class="submit-button">Add Class</button>
        <input type="hidden" name="action" value="add_class"/>
    </form>
</main>

<?php include("./view/footer.php") ?>