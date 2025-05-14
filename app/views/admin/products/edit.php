<h2>Modifier un produit</h2>

<form method="POST" action="/admin/products/update/<?= $product['id'] ?>">
  <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>
  <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
  <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br>
  <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>
  <button type="submit">Mettre à jour</button>
</form>