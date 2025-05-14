<h2>Modifier un produit</h2>

<form method="POST" action="/boutique-en-ligne/admin/products/update/<?= $product['id'] ?>">
  <label>Name:</label><br>
  <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>

  <label>Description:</label><br>
  <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>

  <label>Price:</label><br>
  <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>

  <label>Gender:</label><br>
  <select name="gender_id" required>
    <option value="">-- Gender --</option>
    <option value="1" <?= $product['gender_id'] == 1 ? 'selected' : '' ?>>Homme</option>
    <option value="2" <?= $product['gender_id'] == 2 ? 'selected' : '' ?>>Femme</option>
  </select><br>

  <label>Garment:</label><br>
  <select name="garment_id" required>
    <option value="">-- Garment --</option>
    <option value="1" <?= $product['garment_id'] == 1 ? 'selected' : '' ?>>T-shirt</option>
    <option value="2" <?= $product['garment_id'] == 2 ? 'selected' : '' ?>>Pantalon</option>
    <option value="3" <?= $product['garment_id'] == 3 ? 'selected' : '' ?>>Pull</option>
  </select><br>

  <label>Color:</label><br>
  <select name="color_id" required>
    <option value="">-- Color --</option>
    <option value="1" <?= $product['color_id'] == 1 ? 'selected' : '' ?>>Noir</option>
    <option value="2" <?= $product['color_id'] == 2 ? 'selected' : '' ?>>Blanc</option>
    <option value="3" <?= $product['color_id'] == 3 ? 'selected' : '' ?>>Bleu</option>
  </select><br>

  <label>Size:</label><br>
  <select name="size_id" required>
    <option value="">-- Size --</option>
    <option value="1" <?= $product['size_id'] == 1 ? 'selected' : '' ?>>S</option>
    <option value="2" <?= $product['size_id'] == 2 ? 'selected' : '' ?>>M</option>
    <option value="3" <?= $product['size_id'] == 3 ? 'selected' : '' ?>>L</option>
  </select><br>

  <label>Image URL:</label><br>
  <input type="text" name="image_url" value="<?= htmlspecialchars($product['image_url']) ?>" required><br>

  <label>Stock Quantity:</label><br>
  <input type="number" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required><br>

  <button type="submit">Mettre à jour</button>
</form>