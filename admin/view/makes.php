<?php include("./view/header.php") ?>

<main>
    <h2>Vehicle Make List</h2>
    <table class="edit-category">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($makes as $make): ?>
            <tr>
                <td><?php echo $make["make_name"] ?></td>
                <td>
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                        <input type="hidden" name="action" value="remove_make"/>
                        <input type="hidden" name="make_id" value="<?php echo $make["id"] ?>"/>
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <h2>Add Vehicle Make</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" class="add-category">
        <label>Make Name:</label>
        <br/>
        <input type="text" name="make_name" class="name-input"></input>
        <br/>
        <button type="submit" class="submit-button">Add Make</button>
        <input type="hidden" name="action" value="add_make"/>
    </form>
</main>

<?php include("./view/footer.php") ?>