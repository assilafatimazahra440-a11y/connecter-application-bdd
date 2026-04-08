<?php
require 'functions.php';


$search = $_POST['search'] ?? '';
$category = $_POST['category'] ?? '';
$sort = $_POST['sort'] ?? '';


if (!empty($search)) {
    $recipes = searchRecipes($pdo, $search);
} elseif (!empty($category)) {
    $recipes = filterByCategory($pdo, $category);
} elseif (!empty($sort)) {
    $recipes = sortRecipes($pdo, $sort);
} else {
    $recipes = getRecipes($pdo);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Recipes</h1>


<form method="POST">
    <input type="text" name="search" placeholder="Search recipe">
    <button type="submit">Search</button>
</form>


<form method="POST">
    <select name="category">
        <option value="">All</option>
        <option value="Entree">Entree</option>
        <option value="Plat">Plat</option>
        <option value="Dessert">Dessert</option>
    </select>
    <button type="submit">Filter</button>
</form>


<form method="POST">
    <select name="sort">
        <option value="time_asc">ASC</option>
        <option value="time_desc">DESC</option>
        <option value="new">Newest</option>
        <option value="old">Oldest</option>
    </select>
    <button type="submit">Sort</button>
</form>

<hr>

<?php if (empty($recipes)): ?>
    <p>Aucune recette trouvée</p>
<?php endif; ?>

<div class="container">

<?php foreach ($recipes as $recipe): ?>

    <div class="card">
        <img src="<?= $recipe['image'] ?>">
        <h3><?= $recipe['name'] ?></h3>
        <p><?= $recipe['category'] ?></p>
        <p><?= $recipe['prep_time'] ?> min</p>
    </div>

<?php endforeach; ?>

</div>

</body>
</html>