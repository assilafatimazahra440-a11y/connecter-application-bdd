<?php
require_once "connexion.php";
$sql = $pdo->query("SELECT * FROM products");
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="add.php">Add Product</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
         <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete.php?id=3" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
