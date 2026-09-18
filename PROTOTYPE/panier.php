<?php
session_start();
include 'db.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_SESSION['panier'])) {
    $type_commande = $_POST['type_commande'];
    $id_client = 1; 

    $query = "INSERT INTO Commande (statut, type_commande, id_client) VALUES ('En attente', ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$type_commande, $id_client]);
    $id_commande = $db->lastInsertId();

    
    foreach ($_SESSION['panier'] as $id_produit => $quantite) {
        $stmtP = $db->prepare("SELECT prix FROM Produit WHERE id_produit = ?");
        $stmtP->execute([$id_produit]);
        $prod = $stmtP->fetch(PDO::FETCH_ASSOC);

        $stmtLine = $db->prepare("INSERT INTO LigneCommande (id_commande, id_produit, quantite, prix_unitaire) VALUES (?, ?, ?, ?)");
        $stmtLine->execute([$id_commande, $id_produit, $quantite, $prod['prix']]);
    }

    unset($_SESSION['panier']);
    header("Location: confirmation.php?id=" . $id_commande);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>MonResto - Panier</title>
</head>
<body>
<div class="container">
    <h2>Votre Panier</h2>

    <?php if (empty($_SESSION['panier'])): ?>
        <p>Votre panier est vide.</p>
        <a href="menu.php" class="btn">Retour au menu</a>



    <?php else: ?>
        <form method="POST">
            <label>Type de commande :</label><br>
            <select name="type_commande">
                <option value="À emporter">À emporter</option>
                <option value="Sur place">Sur place</option>
                <option value="Livraison">Livraison</option>
            </select>
            <br><br>
            <button type="submit" class="btn">Valider la commande</button>
        </form>
    <?php endif; ?>



</div>
</body>
</html>