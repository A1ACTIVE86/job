
	<h2>Add Job</h2>

<form action="addjob.php" method="POST"">
    <label>Title</label>
    <input type="text" name="title" />

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Salary</label>
    <input type="text" name="salary" />

    <label>Location</label>
    <input type="text" name="location" />

    <label>Category</label>

    <select name="categoryId">
    <?php
        $stmt = $pdo->prepare('SELECT * FROM category');
        $stmt->execute();

        foreach ($stmt as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }

    ?>

    </select>

    <label>Closing Date</label>
    <input type="date" name="closingDate" />

    <input type="submit" name="submit" value="Add" />

</form>