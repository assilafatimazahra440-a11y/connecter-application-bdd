<?php
require_once 'connexion.php';


function getRecipes($pdo) {
    $stmt = $pdo->query("SELECT * FROM recipes");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function searchRecipes($pdo, $search) {
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE name LIKE ?");
    $stmt->execute(["%$search%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function filterByCategory($pdo, $category) {
    $stmt = $pdo->prepare("SELECT * FROM recipes WHERE category = ?");
    $stmt->execute([$category]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function sortRecipes($pdo, $sort) {

    $sql = "SELECT * FROM recipes";

    if ($sort == "time_asc") {
        $sql .= " ORDER BY prep_time ASC";
    } elseif ($sort == "time_desc") {
        $sql .= " ORDER BY prep_time DESC";
    } elseif ($sort == "new") {
        $sql .= " ORDER BY created_at DESC";
    } elseif ($sort == "old") {
        $sql .= " ORDER BY created_at ASC";
    }

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}