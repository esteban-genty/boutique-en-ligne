<h2>Ajouter un produit</h2>

<form method="POST" action="/boutique-en-ligne/admin/products/store">
  <label>Name:</label><br>
  <input type="text" name="name" placeholder="Name" required><br>

  <label>Description:</label><br>
  <textarea name="description" placeholder="Description"></textarea><br>

  <label>Price:</label><br>
  <input type="number" step="0.01" name="price" placeholder="Price" required><br>

  <label>Gender:</label><br>
  <select name="gender_id" required>
    <option value="">-- Gender --</option>
    <option value="1">Homme</option>
    <option value="2">Femme</option>
  </select><br>

  <label>Garment:</label><br>
  <select name="garment_id" required>
    <option value="">-- Garment --</option>
    <option value="1">Hat</option>
    <option value="1">T-shirt</option>
    <option value="2">Pants</option>
    <option value="3">Shoes</option>
  </select><br>

  <label>Color:</label><br>
  <select name="color_id" required>
    <option value="">-- Color --</option>
    <option value="1">Noir</option>
    <option value="2">Blanc</option>
    <option value="3">Bleu</option>
    <option value="3">gris</option>
  </select><br>

  <label>Size:</label><br>
  <select name="size_id" required>
    <option value="">-- Size --</option>
    <option value="1">XS</option>
    <option value="2">S</option>
    <option value="2">M</option>
    <option value="3">L</option>
    <option value="3">XL</option>
  </select><br>

  <label>Image URL:</label><br>
  <input type="text" name="image_url" placeholder="Image URL" required><br>

  <label>Stock Quantity:</label><br>
  <input type="number" name="stock_quantity" placeholder="Stock quantity" required><br>

  <button type="submit">Créer</button>
</form>