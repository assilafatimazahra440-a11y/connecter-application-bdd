<?php
require_once 'connexion.php';


if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price, quantity = :quantity WHERE id = :id");
    $stmt->execute([
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
        'id' => $id
    ]);
    

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>
        
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br><br>
        
        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br><br>
        
        <button type="submit">Update Product</button>
    </form>
    
    <p><a href="index.php">Back to list</a></p>
</body>
</html>