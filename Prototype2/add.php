<?php
require_once 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, quantity) VALUES (:name, :price, :quantity)");
    $stmt->execute([
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity']
    ]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" required><br><br>
        
        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>
        
        <button type="submit">Add Product</button>
    </form>
    
    <p><a href="index.php">Back to list</a></p>
</body>
</html>