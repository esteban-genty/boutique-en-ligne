<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <label for="gender_id">Genre:</label>
    <label for="gender_id">Genre:</label>
    <select name="gender_id" id="gender_id" required>
        <option value="">Choisir un genre</option>
        <?php foreach ($genders as $gender): ?>
            <option value="<?= htmlspecialchars($gender['id']) ?>">
                <?= htmlspecialchars($gender['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>


    <button type="submit">Add Product</button>
</form>