<h2>Ajouter un produit</h2>

<form method="POST" action="/admin/products/store">
  <input type="text" name="name" placeholder="Nom du produit" required><br>
  <input type="number" step="0.01" name="price" placeholder="Prix" required><br>
  <input type="number" name="stock" placeholder="Stock" required><br>
  <textarea name="description" placeholder="Description"></textarea><br>
  <button type="submit">Créer</button>
</form>