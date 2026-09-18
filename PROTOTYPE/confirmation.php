<?php
include 'db.php';
$database = new Database();
$db = $database->getConnection();

$id_commande = $_GET['id'] ?? 0;
$stmt = $db->prepare("SELECT * FROM Commande WHERE id_commande = ?");
$stmt->execute([$id_commande]);
$cmd = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Confirmation</title>
</head>
<body>
<div class="container">
    <h1>Commande Validée !</h1>
    <p>Statut : <strong><?php echo $cmd['statut']; ?></strong></p>
    <p>Type : <?php echo $cmd['type_commande']; ?></p>
    <p>Temps d'attente estimé : 
        <strong><?php echo $cmd['temps_estime'] ? $cmd['temps_estime'] . " minutes" : "En cours de calcul par le restaurant..."; ?></strong>
    </p>
    <a href="menu.php" class="btn">Commander autre chose</a>
</div>
</body>
</html>