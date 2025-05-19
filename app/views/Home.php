<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>OMNI – The Future</title>
  <!-- TailwindCSS  -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!----------CSS ----->
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/accueil.css">

  <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
    integrity="sha512-..." 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" 
  />
</head>
<body class="antialiased text-gray-100">


<header class="relative h-[75vh] w-full overflow-hidden">

  <?php
  $category = isset($_GET['gender']) ? $_GET['gender'] : 'all';
  $bannerMedia = '';

  if ($category === 'man') {
      $bannerMedia = './public/assets/img/home.mp4';/* banniere  vrai homme*/
  } elseif ($category === 'woman') {
      $bannerMedia = './public/assets/img/femme.mp4'; /* banniere femme*/
  } else {
      $bannerMedia = './public/assets/img/www.omni.com (1).mp4'; /* banniere   defaut*/
  }
  ?>

  <?php if (pathinfo($bannerMedia, PATHINFO_EXTENSION) === 'mp4'): ?>
    <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted>
  <source src="<?= $bannerMedia ?>" type="video/mp4">
</video>

  <?php else: ?>
    <img class="absolute top-0 left-0 w-full h-full object-cover" src="<?= $bannerMedia ?>" alt="Bannière">
  <?php endif; ?>

  <div class="absolute inset-0 bg-black/50 z-10"></div>

 
  <nav class="absolute inset-x-0 top-0 z-20">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
      <div class="text-2xl font-bold text-white">
        <a href="/boutique-en-ligne" class="no-underline text-white hover:opacity-80">OMNI</a>
      </div>

      <!-- Desktop Menu -->
      <ul class="hidden md:flex space-x-8 text-white items-center">
        <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe" class="hover:opacity-80">Collection</a></li>
        <li class="relative">
          <button id="sexBtn" class="hover:opacity-80 flex items-center" aria-haspopup="true" aria-expanded="false">
            Sexe <i class="fas fa-chevron-down ml-2"></i>
          </button>
          <ul id="sexMenu" class="absolute top-full mt-2 left-0 w-40 text-white-800 bg-white text-black rounded shadow-lg opacity-0 pointer-events-none transition-opacity">
            <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="block px-4 py-2 hover:bg-gray-200">Homme</a></li>
            <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="block px-4 py-2 hover:bg-gray-200">Femme</a></li>
          </ul>
        </li>
        <li><a href="#" class="hover:opacity-80">Mon Panier</a></li>
        <li><a href="#" class="hover:opacity-80">Mon Compte</a></li>
      </ul>

      <!-- Burger Button -->
      <div class="flex items-center md:hidden">
        <button id="burgerBtn" class="text-white focus:outline-none">
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="hidden md:hidden bg-black/90 text-white absolute top-0 left-0 w-full z-30">
    <ul class="flex flex-col p-6 space-y-4">
      <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe">Collection</a></li>
      <li><a href="#">Mon Panier</a></li>
      <li><a href="#">Mon Compte</a></li>
      <li>
        <button id="sexBtnMobile" class="w-full text-left flex items-center justify-between" aria-expanded="false">
          Sexe <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="sexMenuMobile" class="mt-2 ml-4 space-y-2 hidden">
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman">Femme</a></li>
        </ul>
      </li>
    </ul>
  </div>
</header>
<!------------- Categories----------------->
<section class="tendances-section">
  <div class="tendances-decor-line"></div>
  <div class="tendances-decor-dots"></div>
  <div class="tendances-inner">
    <h2>Tendances</h2>
    <p class="tendances-description">Découvrez nos dernières collections et les tendances du moment.</p>
    
    <div class="tendances-grid">
      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="tendance-card">
        <img src="./public/assets/img/tendances-femmes.jpg" alt="Tendance Femme">
        <div class="card-label">
          <span class="card-label-category">Catégorie</span>
          <h3 class="card-label-title">Femme</h3>
        </div>
      </a>

      <a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="tendance-card">
        <img src="./public/assets/img/tendances-homme.jpg" alt="Tendance Homme">
        <div class="card-label">
          <span class="card-label-category">Catégorie</span>
          <h3 class="card-label-title">Homme</h3>
        </div>
      </a>

 
    </div>

    <div class="collection-cta">
      <a href="/boutique-en-ligne/index.php?controller=product&action=index">
        <button class="btn-collection">Voir la collection</button>
      </a>
    </div>
  </div>
</section>

<!------------- Categories----------------->

  <!-- NOS PRODUITS -->
  <section id="get-started" class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-gray-800 mb-8">Nos Produits</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($randomProducts as $prod): ?>
          <div class="relative group overflow-hidden rounded-lg shadow-lg">
            <img 
              src="<?= htmlspecialchars($prod['image_url']) ?>" 
              alt="<?= htmlspecialchars($prod['name']) ?>" 
              class="w-full h-64 object-cover transition-transform group-hover:scale-105"
            >
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-4">
              <span class="text-white font-semibold"><?= htmlspecialchars($prod['name']) ?></span>
              <span class="text-green-400 font-bold">
                €<?= number_format($prod['price'], 2, ',', ' ') ?>
              </span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
    <!-- NOS PRODUITS -->

<footer class="bg-gray-900 text-white w-full">
  <div class="w-full grid grid-cols-1 md:grid-cols-4 gap-12 px-8 py-16">
    
    <div class="flex flex-col items-start space-y-8 w-full">
      <div class="flex items-center w-full">
        <span class="text-3xl font-bold text-blue-400">OMNI</span>
        <span class="h-8 border-r-2 border-blue-400 ml-6"></span>
      </div>

      <h4 class="text-xl font-semibold w-full text-gray-300">Contactez-nous</h4>

      <div class="flex items-center space-x-4 w-full">
        <input
          type="email"
          placeholder="Mon email"
          required
          class="flex-1 bg-transparent border-2 border-white rounded-full px-6 py-3 placeholder-gray-300 focus:outline-none text-white w-full"
        />
        <button
          type="submit"
          aria-label="Envoyer"
          class="w-12 h-12 flex items-center justify-center border-2 border-white rounded-full hover:bg-white/20 transition flex-shrink-0"
        >
          <i class="fas fa-arrow-right text-white"></i>
        </button>
      </div>

      <input
        type="text"
        placeholder="Mon message"
        required
        class="w-full bg-transparent border-2 border-white rounded-full px-6 py-3 placeholder-gray-300 focus:outline-none text-white"
      />
    </div>
    
    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">Informations Légales</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">Charte de Confidentialité</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Mentions Légales</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Conditions générales de ventes</a></li>
      </ul>
    </div>

    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">Informations Légales</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">Charte de Confidentialité</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Mentions Légales</a></li>
        <li><a href="#" class="text-base hover:text-blue-400 transition">Conditions générales de ventes</a></li>
      </ul>
    </div>

    <div class="flex flex-col space-y-6 w-full">
      <h4 class="text-xl font-semibold text-gray-300">La marque</h4>
      <ul class="space-y-3">
        <li><a href="#" class="text-base hover:text-blue-400 transition">Nom de marque</a></li>
      </ul>
    </div>
  </div>

  <div class="bg-gray-900 text-center py-6 w-full">
    <p class="text-base text-gray-300">&copy; 2025 Sébastien, Esteban, Lamine</p>
  </div>
</footer>


  <!-- Burger Menu JS -->
  <script>
    const burgerBtn  = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    burgerBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
