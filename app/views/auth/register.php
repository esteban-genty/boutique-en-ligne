<h2>Inscription</h2>
<form method="POST" action="/boutique-en-ligne/register">
  <input type="text" name="first_name" placeholder="Prenom" required><br>
  <input type="text" name="name" placeholder="Nom" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="mot de passe" required><br>
  <input type="password" name="confirm_password" placeholder="Confirmer mot de passe" required><br>
  <button type="submit">Inscription</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>