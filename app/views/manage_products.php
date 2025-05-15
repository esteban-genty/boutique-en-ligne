<h2>Add Product</h2>

<form method="POST" action="/boutique-en-ligne/add-product" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01" required>

    <label for="gender_id">Genre:</label>
    <select name="gender_id" id="gender_id" required>
        <option value="">Choisir un genre</option>
        <?php foreach ($genders as $gender): ?>
            <option value="<?= htmlspecialchars($gender['id']) ?>">
                <?= htmlspecialchars($gender['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="type">Type de vêtements</label>
    <select name="garment_id" id="garment_id" required>
        <option value="">Choisir un type de vêtement</option>
        <?php foreach ($garments as $garment): ?>
            <option value="<?= htmlspecialchars($garment['id']) ?>">
                <?= htmlspecialchars($garment['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="color_id">Color:</label>
    <select name="color_id" id="color_id" required>
        <option value="">Choisir une couleur</option>
        <?php foreach ($colors as $color): ?>
            <option value="<?= htmlspecialchars($color['id']) ?>">
                <?= htmlspecialchars($color['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="size_id">Size:</label>
    <select name="size_id" id="size_id" required>
        <option value="">Choisir une taille</option>
        <?php foreach ($sizes as $size): ?>
            <option value="<?= htmlspecialchars($size['id']) ?>">
                <?= htmlspecialchars($size['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="stock_quantity">Stock Quantity:</label>
    <input type="number" name="stock_quantity" id="stock_quantity" required>

    <label for="image_url">Image URL:</label>
    <input type="text" name="image_url" id="image_url" required>




    <button type="submit">Add Product</button>
</form>