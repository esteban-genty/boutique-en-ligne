
<?php 





?>
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
<body>
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
<section class="promo-section">
  <nav class="promo-menu" role="navigation" aria-label="Promo menu">
    <!-- Bouton hamburger -->
    <button id="promoBurger" class="promo-burger"
            aria-controls="promoLinks" aria-expanded="false"
            aria-label="Ouvrir le menu promo">
      <span class="burger-bar" aria-hidden="true"></span>
      <span class="burger-bar" aria-hidden="true"></span>
      <span class="burger-bar" aria-hidden="true"></span>
    </button>
      <!-- Bouton hamburger -->

    <ul id="promoLinks" class="promo-links">
      <li><a href="#">Promo</a></li>
      <li><a href="#">Vêtements</a></li>
      <li><a href="#">Tendances</a></li>
      <li><a href="#">Chaussures</a></li>
      <li><a href="#">Accessoires</a></li>
      <li><a href="#">Nouveauté</a></li>
    </ul>
  </nav>

  <div class="promo-video">
    <video
      class="banner-video"
      poster="./public/assets/img/banner.png"
      autoplay muted loop playsinline preload="metadata"
      aria-label="Vidéo de présentation de la collection"
    >
      <source src="/boutique-en-ligne/public/assets/img/www.omni.com.mp4" type="video/mp4">

    </video>
    <div class="video-overlay">
 
      <button class="collection-button">Voir collection</button>
    </div>
  </div>
</section>

<!--  Nos Tendances -->
<section class="tendances-section">
  <h2>Nos Tendances</h2>
  <div class="tendances-grid">
    <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="tendance-card">
      <img src="/boutique-en-ligne/public/assets/img/tendances-femmes.jpg" alt="Tendance Femme">
      <div class="card-label">Femme</div>
    </a>
    <a href="/boutique-en-ligne/index.php?controller=product&action=index&category=homme" class="tendance-card">
      <img src="/boutique-en-ligne/public/assets/img/tendances-homme.jpg" alt="Tendance Homme">
      <div class="card-label">Homme</div>
    </a>
    <a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe" class="tendance-card">
      <img src="/boutique-en-ligne/public/assets/img/tendances-unisexe.jpg" alt="Tendance Unisexe">
      <div class="card-label">Unisexe</div>
    </a>
  </div>
  <div class="collection-cta">
    <button class="btn-collection">Voir la collection</button>
  </div>
</section>
<!-- Nos Tendances -->



<section class="products-section">
  <h2>Nos Produits</h2>
  <div class="products-grid">
    <?php foreach ($randomProducts as $prod): ?>
      <div class="product-card">
        <img
          src="<?= htmlspecialchars($prod['image_url']) ?>"
          alt="<?= htmlspecialchars($prod['name']) ?>"
        >
        <div class="product-overlay">
          <span class="product-name">
            <?= htmlspecialchars($prod['name']) ?>
          </span>
          <span class="product-price">
            €<?= number_format($prod['price'], 2, ',', ' ') ?>
          </span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>



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
  
</body>
</html>