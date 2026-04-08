<?php
require 'connexion.php';

try {
    $stmt = $pdo->query("SELECT * FROM recipes");
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recettes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Liste des recettes</h1>

<div class="container">

<?php foreach ($recipes as $recipe): ?>

    <div class="card">
        <img src="<?= $recipe['image'] ?>" alt="image">

        <h3><?= $recipe['name'] ?></h3>
        <p>Category: <?= $recipe['category'] ?></p>
        <p>Time: <?= $recipe['prep_time'] ?> min</p>

    </div>

<?php endforeach; ?>

</div>

</body>
</html>