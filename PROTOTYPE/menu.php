<?php
session_start();
include 'db.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_POST['id_produit'])) {
    $id = $_POST['id_produit'];
    $_SESSION['panier'][$id] = ($_SESSION['panier'][$id] ?? 0) + 1;
}

$query = "SELECT * FROM Produit WHERE disponible = 1";
$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>MonResto - Menu</title>
</head>
<body>

<br>
    <div style="margin-top: 15px;">
        <a href="panier.php" class="btn">Voir mon Panier</a>
        <a href="ajouter_produit.php" class="btn" style="background-color: #27ae60; margin-left: 10px;">+ Ajouter un Plat/Boisson</a>
    </div>
</div>


<div class="container">
    <h1>MonResto - Menu</h1>
    <?php foreach ($products as $p): ?>
        <div class="item">
            <div>
                <strong><?php echo $p['nom']; ?></strong><br>
                <small><?php echo $p['description']; ?></small><br>
                <span><?php echo $p['prix']; ?> €</span>
            </div>
            <form method="POST">
                <input type="hidden" name="id_produit" value="<?php echo $p['id_produit']; ?>">
                <button type="submit">Ajouter</button>
            </form>
        </div>
    <?php endforeach; ?>
    <br>
    <a href="panier.php" class="btn">Voir mon Panier</a>
</div>




</body>
</html>