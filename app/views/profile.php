<?php
var_dump($user);

if (!isset($user) || !is_array($user)) {
    echo "Erreur : Données utilisateur non disponibles.";
    exit;
}
?>
<h2>User Profile</h2>

<p><strong>Name:</strong> <?= htmlspecialchars($user['name'] ?? 'N/A') ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email'] ?? 'N/A') ?></p>
<p><strong>Role:</strong> <?= isset($user['is_admin']) && $user['is_admin'] ? 'Admin' : 'User' ?></p>

<h3>Modifier le profil</h3>
<form method="POST" action="/boutique-en-ligne/profile/update">
    <label for="first_name">Prénom :</label>
    <input type="text" name="first_name" id="first_name" value="<?= htmlspecialchars($user['first_name'] ?? '') ?>">
    <br>
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
    <br>
    <label for="password">Nouveau mot de passe (laisser vide pour ne pas changer) :</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">Mettre à jour</button>
</form>