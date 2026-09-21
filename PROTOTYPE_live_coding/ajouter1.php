<?php
include 'db1.php' ;
$data = new Data() ;
$db = $data->get_connexion() ;

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 $name_Nom_du_produit_1 = $_POST['name_Nom_du_produit'] ;
 $Description_1 = $_POST['Description'] ; 
 $Prix_1 = $_POST['Prix'] ; 
 $Categorie_1 = $_POST['Categorie'] ; 

 $query = "INSERT INTO Produit (nom ,description ,prix ,id_categorie ) VALUE (?,?,?,?)" ;
 $stmt = $db->prepare($query);
 $stmt->execute([$name_Nom_du_produit_1 ,$Description_1 ,$Prix_1 ,$Categorie_1]);
}

 $query_1 = "SELECT * FROM Categorie";
 $stmt_1 = $db->prepare($query_1);
 $stmt_1->execute();
 $category = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'ajouter</title>
</head>
<body>
    <form method="POST">
        <h2>Ajouter un Plat ou une Boisson</h2>
        <label class="name_Nom_du_produit">Nom du produit</label>
        <input type="text" name="name_Nom_du_produit" require>

        <label>Description</label>
        <input type="text" name="Description" require>

        <label>Prix</label>
        <input type="number" name="Prix" require>
        
        <select name="Categorie">
         <?php foreach ($category as $C) :?>
            <option value="<?php echo $C['id_categorie'] ; ?>">
                <?php echo $C['nom'] ; ?>
            </option>
         <?php endforeach ;?>
        </select>

        <button type="submit">
          AJOUTER
        </button>

       

    </form>

    <a href="menu1.php"> menu page</a>
</body>
</html>