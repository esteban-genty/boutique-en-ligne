
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI</title>

    <!-----------CSS------------------>
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/header.css">
<link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/footer.css">
<link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/accueil.css">

    <!-----------CSS------------------>


<!-----------Style Police------------------->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-----------Style Police------------------->

</head>

<header>
  <div class="header-container">
    <div class="left-group">
      <div class="logo">OMNI</div>
      <button class="burger" aria-label="Menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
<!-- HOMME / FEMME -->
<nav class="main-nav">
  <ul class="flex space-x-4">
    <li>
    <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="btn">Homme</a>
    </li>
    <li>
    <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="btn">Femme</a>
  </ul>
</nav>



    <div class="search-wrapper">
      <input type="text" placeholder="Rechercher" aria-label="Recherche"/>
    </div>

    <div class="icons">
      <a href="#" aria-label="Panier"><i class="fa-solid fa-cart-shopping"></i></a>
      <a href="#" aria-label="Mon compte"><i class="fa-solid fa-user"></i></a>
    </div>
  </div>
</header>

<!-- Détails du produit -->
<div class="container mt-5">
    <div class="row">
   
            <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
                    <h2><?= htmlspecialchars($product['name'] ?? 'Nom du produit indisponible') ?></h2>
            <p class="text-muted"><?= htmlspecialchars($product['garment'] ?? 'Type de vêtement indisponible') ?> - <?= htmlspecialchars($product['gender'] ?? 'Genre indisponible') ?></p>
            <p><?= nl2br(htmlspecialchars($product['description'] ?? 'Aucune description disponible')) ?></p>
            <p><strong>Couleur :</strong> <?= htmlspecialchars($product['color'] ?? 'Couleur indisponible') ?></p>
            <p><strong>Taille :</strong> <?= htmlspecialchars($product['size'] ?? 'Taille indisponible') ?></p>
            <p><strong>Prix :</strong> <?= number_format($product['price'], 2, ',', ' ') ?> €</p>
            <p><strong>En stock :</strong> <?= intval($product['stock_quantity']) ?></p>

            <form action="panier.php" method="POST">
                <input type="hidden" name="product_id" value="<?= intval($product['id']) ?>">
                <button type="submit" class="btn btn-primary mt-3">Acheter</button>
            </form>
        </div>
    </div>
<!-- Détails du produit -->
 
    <!-- Suggestions -->
    <?php if ($suggestions): ?>
        <div class="mt-5">
            <h3>Suggestions</h3>
            <div class="row">
                <?php foreach ($suggestions as $suggestion): ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?= htmlspecialchars($suggestion['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($suggestion['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($suggestion['name']) ?></h5>
                                <p class="card-text"><?= number_format($suggestion['price'], 2, ',', ' ') ?> €</p>
                          <a href="index.php?controller=product&action=details&id=<?= $suggestion['id'] ?>" class="btn btn-primary">Voir le produit</a>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info mt-5" role="alert">
            Aucune suggestion pour ce produit.
        </div>
    <?php endif; ?>
</div>





<footer>
    <div class="footer-top">
      <div class="footer-logo">
        <h2>nom du site |</h2>
      </div>
      <div class="footer-links">
        <h3>Informations Légales</h3>
        <ul>
          <li><a href="#">Charte de Confidentialités</a></li>
          <li><a href="#">Mention Légales</a></li>
          <li><a href="#">Conditions générales de ventes</a></li>
        </ul>
      </div>
      <div class="footer-links">
        <h3>Informations Légales</h3>
        <ul>
          <li><a href="#">Charte de Confidentialités</a></li>
          <li><a href="#">Mention Légales</a></li>
          <li><a href="#">Conditions générales de ventes</a></li>
        </ul>
      </div>
      <div class="footer-brand">
        <h3>La marque</h3>
        <ul>
          <li><a href="#">Nom de marque</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-contact-social">
      <div class="footer-contact">
        <h3>Contactez-nous</h3>
        <form>
          <label for="email">Mon email :</label>
          <input type="email" id="email" placeholder="Votre email">
          <label for="message">Mon message :</label>
          <input type="text" id="message" placeholder="Votre message">
          <button type="submit" class="send-button"><i class="fas fa-arrow-right"></i></button>
        </form>
      </div>
      <div class="footer-social">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
        <a href="#"><i class="fab fa-snapchat-ghost"></i></a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Copyright Sébastien, Esteban, Lamine</p>
    </div>
  </footer>
  <script src="/boutique-en-ligne/public/assets/js/burger-menu.js" defer></script>