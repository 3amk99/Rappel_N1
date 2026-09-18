<?php
include 'db.php';

$database = new Database();
$db = $database->getConnection();

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];

    $query = "INSERT INTO Produit (nom, description, prix, disponible, id_categorie) VALUES (?, ?, ?, 1, ?)";
    $stmt = $db->prepare($query);
    
    if ($stmt->execute([$nom, $description, $prix, $id_categorie])) 
    {
        $message = "Produit ajouté avec succès !";
    } 
    else 
    {
        $message = "Erreur lors de l'ajout du produit.";
    }
}

$catQuery = "SELECT * FROM Categorie";
$catStmt = $db->prepare($catQuery);
$catStmt->execute();
$categories = $catStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>MonResto - Ajouter un Produit</title>
</head>
<body>

<div class="container">
    <h2>Ajouter un Plat ou une Boisson</h2>

    <?php if($message): ?>
        <p style="color: #27ae60; font-weight: bold;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Nom du produit :</label><br>
        <input type="text" name="nom" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box;"><br>

        <label>Description :</label><br>
        <textarea name="description" rows="3" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box;"></textarea><br>

        <label>Prix (€) :</label><br>
        <input type="number" step="0.01" name="prix" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box;"><br>

        <label>Catégorie :</label><br>
        <select name="id_categorie" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; box-sizing: border-box;">
            <?php foreach($categories as $cat): ?>
                <option value="<?php echo $cat['id_categorie']; ?>">
                <?php echo $cat['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" class="btn">Enregistrer le produit</button>
    </form>
    
    <br>
    <a href="menu.php" class="btn" style="background-color: #7f8c8d;">Voir le Menu Public</a>
</div>
</body>
</html>