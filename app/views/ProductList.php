<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? '', ENT_QUOTES, 'UTF-8') ?> - OMNI</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/header.css">
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/footer.css">
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/product.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="left-group">
                <div class="logo">OMNI</div>
                <button class="burger" aria-label="Menu" aria-expanded="false">
                    <span></span><span></span><span></span>
                </button>
            </div>
            <nav class="main-nav">
                <ul class="flex space-x-4">
                    <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="btn <?= (isset($_GET['gender']) && $_GET['gender'] === 'man') ? 'active' : '' ?>">Homme</a></li>
                    <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="btn <?= (isset($_GET['gender']) && $_GET['gender'] === 'woman') ? 'active' : '' ?>">Femme</a></li>
                    <li><a href="/boutique-en-ligne/index.php?controller=product&action=index" class="btn <?= (!isset($_GET['gender']) || ($_GET['gender'] !== 'man' && $_GET['gender'] !== 'woman')) ? 'active' : '' ?>">Tous</a></li>
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
      <!-- Header -->
    <main class="products-container">

        
        <!-- Filtres -->
        <div class="filters-container">
    <h2>Filtrer les produits</h2>
    <div class="filters-options">
        <!-- Type de vêtement -->
        <div class="filter-group">
            <label for="garment-filter" class="filter-label">Type de vêtement</label>
            <select id="garment-filter" class="filter-select">
                <option value="">Tous les types</option>
                <?php
                $garments = [];
                foreach ($products as $product) {
                    $val = $product['garment'] ?? '';
                    if ($val !== '' && !in_array($val, $garments)) {
                        $garments[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(ucfirst($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Couleur -->
        <div class="filter-group">
            <label for="color-filter" class="filter-label">Couleur</label>
            <select id="color-filter" class="filter-select">
                <option value="">Toutes les couleurs</option>
                <?php
                $colors = [];
                foreach ($products as $product) {
                    $val = $product['color'] ?? '';
                    if ($val !== '' && !in_array($val, $colors)) {
                        $colors[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(ucfirst($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Taille -->
        <div class="filter-group">
            <label for="size-filter" class="filter-label">Taille</label>
            <select id="size-filter" class="filter-select">
                <option value="">Toutes les tailles</option>
                <?php
                $sizes = [];
                foreach ($products as $product) {
                    $val = $product['size'] ?? '';
                    if ($val !== '' && !in_array($val, $sizes)) {
                        $sizes[] = $val;
                        echo '<option value="'.htmlspecialchars($val, ENT_QUOTES, 'UTF-8').'">'.htmlspecialchars(strtoupper($val), ENT_QUOTES, 'UTF-8').'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <!-- Bouton Réinitialiser -->
    <button class="reset-filters" id="reset-filters">Réinitialiser les filtres</button>
</div>

                <!-- Filtres -->

          <?php foreach ($products as $i => $product): ?>
    <?php
    $name    = $product['name'] ?? '';
    $garment = $product['garment'] ?? '';
    $color   = $product['color'] ?? '';
    $size    = $product['size'] ?? '';
    $price   = $product['price'] ?? 0;
    $img     = $product['image_url'] ?? '';
    $reverse = $i % 2 === 1 ? 'reverse' : '';
    $productId = $product['id'] ?? 0;
    ?>
    <div class="product-card-vertical <?= $reverse ?>"
         data-garment="<?= htmlspecialchars($garment) ?>"
         data-color="<?= htmlspecialchars($color) ?>"
         data-size="<?= htmlspecialchars($size) ?>"
         data-product-id="<?= intval($productId) ?>">
        
        <div class="product-image">
            <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($name) ?>">
        </div>
        
        <div class="product-info">
            <div>
                <h3 class="product-name"><?= htmlspecialchars($name) ?></h3>
                <p class="product-details">
                    <?= ucfirst($color) ?> | <?= strtoupper($size) ?> | <?= ucfirst($garment) ?>
                </p>
            </div>
            <div class="product-meta">
                <span class="product-price">€<?= number_format($price, 2, ',', ' ') ?></span>
                <div class="product-actions">
                    <button class="cart-button" aria-label="Ajouter au panier"></button>
                    <button class="like-button" aria-label="Ajouter aux favoris"></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="product-separator">
<?php endforeach; ?>


    </main>
    
    <footer>
       
    </footer>
    
   
    <script src="/boutique-en-ligne/public/assets/js/burger-menu.js" defer></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const garmentFilter = document.getElementById('garment-filter');
        const colorFilter = document.getElementById('color-filter');
        const sizeFilter = document.getElementById('size-filter');
        const resetButton = document.getElementById('reset-filters');
        const productCards = document.querySelectorAll('.product-card-vertical');

        function applyFilters() {
            const garmentVal = garmentFilter.value.toLowerCase();
            const colorVal = colorFilter.value.toLowerCase();
            const sizeVal = sizeFilter.value.toLowerCase();
            let count = 0;

            productCards.forEach(card => {
                const cardGarment = card.dataset.garment.toLowerCase();
                const cardColor = card.dataset.color.toLowerCase();
                const cardSize = card.dataset.size.toLowerCase();

                const matchGarment = !garmentVal || cardGarment === garmentVal;
                const matchColor = !colorVal || cardColor === colorVal;
                const matchSize = !sizeVal || cardSize === sizeVal;

                if (matchGarment && matchColor && matchSize) {
                    card.style.display = 'flex'; 
                    count++;
                } else {
                    card.style.display = 'none';
                }
            });

            const noMsg = document.querySelector('.no-filters-results');

            if (count === 0) {
                if (!noMsg) {
                    const msg = document.createElement('div');
                    msg.className = 'no-products no-filters-results';
                    msg.textContent = 'Aucun produit ne correspond à votre sélection.';
                    document.querySelector('main').appendChild(msg);
                }
            } else {
                if (noMsg) noMsg.remove();
            }
        }

        garmentFilter.addEventListener('change', applyFilters);
        colorFilter.addEventListener('change', applyFilters);
        sizeFilter.addEventListener('change', applyFilters);

        resetButton.addEventListener('click', function () {
            garmentFilter.value = '';
            colorFilter.value = '';
            sizeFilter.value = '';
            applyFilters();
        });
    });
</script>

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
</body>
</html>
