<h1><?= htmlspecialchars($pageTitle) ?></h1>

<?php if (empty($products)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <img src="<?= $product['image_url'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" width="50">
                        <?= htmlspecialchars($product['name']) ?>
                    </td>
                    <td><?= number_format($product['price'], 2) ?> €</td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= number_format($product['subtotal'], 2) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Total : <?= number_format($total, 2) ?> €</h3>
<?php endif; ?>
<form method="post" action="/boutique-en-ligne/cart/clear" onsubmit="return confirm('Voulez-vous vraiment vider votre panier ?');">
    <button type="submit" class="btn btn-danger">Vider le panier</button>
</form>
