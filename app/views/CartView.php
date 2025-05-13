

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNI</title>


  <!-- TailwindCSS  -->
  <script src="https://cdn.tailwindcss.com"></script>

    <!-----------CSS------------------>
    <link rel="stylesheet" href="/boutique-en-ligne/public/assets/css/details.css">

<!-----------Style Police------------------->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-----------Style Police------------------->

</head>

<header class="relative h-[75vh] overflow-hidden">


<video class="absolute top-0 left-0 w-full h-full object-cover" autoplay loop muted>
  <source src="./public/assets/img/details.mp4" type="video/mp4">

</video>

    
 
  <div class="absolute inset-0 bg-black/50 z-10"></div>

 <!-- NAV Desktop -->
<nav class="absolute inset-x-0 top-0 z-20">
  <div class="max-w-7xl mx-auto flex items-center justify-between p-6">
   
     <div class="text-2xl font-bold text-white">
  <a href="/boutique-en-ligne" class="no-underline text-white hover:opacity-80">OMNI</a>
</div>


    <ul class="hidden md:flex space-x-8 text-white items-center">
      <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe" class="hover:opacity-80">Collection</a></li>
    

     
      <li class="relative">
        <button
          id="sexBtn"
          class="hover:opacity-80 flex items-center"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Sexe <i class="fas fa-chevron-down ml-2"></i>
        </button>
        <ul
          id="sexMenu"
          class="absolute top-full mt-2 left-0 w-40  text-white-800 rounded shadow-lg opacity-0 pointer-events-none transition-opacity"
        >
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man" class="block px-4 py-2 hover:bg-gray-500">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman" class="block px-4 py-2 hover:bg-gray-500">Femme</a></li>
        </ul>
      </li>

<li>
 <a href="/boutique-en-ligne/cart">Mon Panier</a>
</li>


      <li><a href="#" class="hover:opacity-80">Mon Compte</a></li>
    </ul>

    <!-- Burger mobile -->
    <div class="flex items-center">
      <button id="burgerBtn" class="md:hidden text-white">
        <i class="fas fa-bars fa-lg"></i>
      </button>
    </div>
  </div>

  <!-- Menu mobile  -->
  <div id="mobileMenu" class="hidden md:hidden bg-black/80">
    <ul class="flex flex-col p-6 space-y-4 text-white">
   <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&category=unisexe">Collection</a></li>
<li><a href="?controller=cart&action=index" class="hover:opacity-80">Mon Panier</a></li>

      <li><a href="#">Mon Compte</a></li>
      <li>
        <!-- Mobile  Sexe -->
        <button
          id="sexBtnMobile"
          class="w-full text-left flex items-center justify-between"
          aria-expanded="false"
        >
          Sexe <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="sexMenuMobile" class="mt-2 ml-4 space-y-2 hidden">
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=man">Homme</a></li>
          <li><a href="/boutique-en-ligne/index.php?controller=product&action=index&gender=woman">Femme</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>

<script>
// Desktop 
const sexBtn = document.getElementById('sexBtn');
const sexMenu = document.getElementById('sexMenu');
sexBtn.addEventListener('click', () => {
  const expanded = sexBtn.getAttribute('aria-expanded') === 'true';
  sexBtn.setAttribute('aria-expanded', String(!expanded));
  sexMenu.classList.toggle('opacity-100');
  sexMenu.classList.toggle('pointer-events-auto');
});

//   mobile
const sexBtnMobile = document.getElementById('sexBtnMobile');
const sexMenuMobile = document.getElementById('sexMenuMobile');
sexBtnMobile.addEventListener('click', () => {
  const exp = sexBtnMobile.getAttribute('aria-expanded') === 'true';
  sexBtnMobile.setAttribute('aria-expanded', String(!exp));
  sexMenuMobile.classList.toggle('hidden');
});
</script>


    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden md:hidden bg-black/80">
      <ul class="flex flex-col p-6 space-y-4 text-white">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blocks</a></li>
        <li><a href="#">Patterns</a></li>
        <li><a href="#">Templates</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Contact</a></li>
        <li>
        
        </li>
      </ul>
    </div>
  </nav>


</header>

<h1>Votre Panier</h1>

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
    <button type="submit">Vider le panier</button>
</form>

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
        <li><a href="#" class="text-base hover:text-blue-400 transition">OMNI</a></li>
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