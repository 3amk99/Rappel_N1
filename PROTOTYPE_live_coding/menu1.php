<?php
session_start();
include 'db1.php';
$data = new Data() ;
$db = $data->get_connexion();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $id_produit = $_POST['id_produit_1'] ;
  $_SESSION['panier'][$id_produit] = ($_SESSION['panier'][$id_produit] ?? 0) + 1 ;
}

$Z1 = "SELECT * FROM Produit";
$Z12 =  $db->prepare($Z1);
$Z12->execute();
$Produit = $Z12->fetchAll(PDO:: FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu page</title>
</head>
<body>
    <h2>MonResto - Menu</h2>
    <form method="POST">
        <?php foreach ($Produit as $P) :?>
            <strong> <?php echo $P['nom'] ; ?> </strong>
            <strong> <?php echo $P['description'] ; ?> </strong>
            <strong> <?php echo $P['prix'] ; ?> </strong>

            <input type="hidden" name="id_produit_1" value="<?php echo $P['id_produit'] ; ?>">
            <button type="submit">
                Ajouter
            </button>

        <?php endforeach ;?>
        
    </form>
    <a href="panier.php"> panier </a>
</body>
</html>