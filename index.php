<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI</title>

    <!-----------CSS------------------>
 <link rel="stylesheet" href="../boutique-en-ligne/public/assets/css/header.css">
 <link rel="stylesheet" href="../boutique-en-ligne/public/assets/css/footer.css">
 <link rel="stylesheet" href="../boutique-en-ligne/public/assets/css/accueil.css">

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

    <!-- NAVIGATION HOMME / FEMME -->
    <nav class="main-nav">
      <ul>
        <li><a href="#">Homme</a></li>
        <li><a href="#">Femme</a></li>
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

<!----
<section class="promo-banner">
  <p>-20% sur les produits en promo !</p>
</section>--->

<section class="promo-section">
  <nav class="promo-menu">
    <ul>
      <li>Promo</li>
      <li>Nouveauté</li>
      <li>Tendances</li>
      <li>Vetements</li>
      <li>Chaussures</li>
      <li>Accessoires</li>
    </ul>
  </nav>

  <div class="promo-image">
    <img src="../boutique-en-ligne/public/assets/img/banniere.jpg" alt="Collection" />
    <button class="collection-button">Voir collection</button>
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
  <script src="../boutique-en-ligne/public/assets/js/burger-menu.js" defer></script>
  
</body>
</html>