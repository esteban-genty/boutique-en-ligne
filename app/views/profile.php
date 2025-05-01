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

<!-- Bloc pour ajouter : modifier mot de passe, nom, etc. -->