<h2>Liste des produits</h2>

<a href="/admin/products/create">➕ Ajouter un produit</a>

<table border="1" cellpadding="10" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prix</th>
      <th>Stock</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($products)) : ?>
      <?php foreach ($products as $product) : ?>
        <tr>
          <td><?= htmlspecialchars($product['id']) ?></td>
          <td><?= htmlspecialchars($product['name']) ?></td>
          <td><?= htmlspecialchars($product['price']) ?> €</td>
          <td><?= htmlspecialchars($product['stock_quantity']) ?></td>
          <td>
            <a href="/admin/products/edit/<?= $product['id'] ?>">✏️ Modifier</a> |
            <a href="/admin/products/delete/<?= $product['id'] ?>" onclick="return confirm('Supprimer ce produit ?');">🗑️ Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="5">Aucun produit trouvé.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>