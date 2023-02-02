
    <form method="post">
        <select name="categoryFilter">
            <option value="">All</option>
            <?php
            $stmt = $pdo->prepare('SELECT * FROM category');
            $stmt->execute();
            foreach ($stmt as $category) {
                echo '<option value="' . $category['id'] . '" ' . ($categoryFilter == $category['id'] ? 'selected' : '') . '>' . $category['name'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Filter">
    </form>