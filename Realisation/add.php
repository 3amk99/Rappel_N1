<?php
include 'db.php';

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre_pub'];
    $contenu = $_POST['contenu_pub'];
    $membre_id = $_POST['membre_id'];
    $domaine_id = $_POST['domaine_id'];
    $entreprise_id = $_POST['entreprise_id'];

    $sql = "INSERT INTO publication (titre_pub, contenu_pub, membre_id, domaine_id, entreprise_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $contenu, $membre_id, $domaine_id, $entreprise_id]);

    header('Location: publications.php');
    exit();
}

// Fetch lists for dropdowns
$membres = $pdo->query("SELECT * FROM membre")->fetchAll(PDO::FETCH_ASSOC);
domaines = $pdo->query("SELECT * FROM domaine")->fetchAll(PDO::FETCH_ASSOC);
$entreprises = $pdo->query("SELECT * FROM entreprise")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Publication - Professional Social Network</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 600px; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: auto; }
        h2 { color: #0077b5; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], textarea, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 120px; }
        button { background: #0077b5; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; font-size: 16px; }
        button:hover { background: #004182; }
        a { display: inline-block; margin-top: 15px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add New Publication</h2>
    <form method="POST">
        <label>Publication Title:</label>
        <input type="text" name="titre_pub" required>

        <label>Content:</label>
        <textarea name="contenu_pub" required></textarea>

        <label>Member (Author):</label>
        <select name="membre_id" required>
            <?php foreach ($membres as $m): ?>
                <option value="<?= $m['id_membre'] ?>"><?= htmlspecialchars($m['nom_membre']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Domain (Category):</label>
        <select name="domaine_id" required>
            <?php foreach ($domaines as $d): ?>
                <option value="<?= $d['id_domaine'] ?>"><?= htmlspecialchars($d['libelle_domaine']) ?></option>
            <?php endforeach; ?>
        </select>

        <label>Company:</label>
        <select name="entreprise_id" required>
            <?php foreach ($entreprises as $e): ?>
                <option value="<?= $e['id_entreprise'] ?>"><?= htmlspecialchars($e['nom_entreprise']) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Save Publication</button>
    </form>
    <br>
    <a href="publications.php">&larr; Back to Publications List</a>
</div>
</body>
</html>