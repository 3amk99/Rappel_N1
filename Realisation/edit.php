<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: publications.php');
    exit();
}

// Handle Update Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre_pub'];
    $contenu = $_POST['contenu_pub'];
    $membre_id = $_POST['membre_id'];
    $domaine_id = $_POST['domaine_id'];
    $entreprise_id = $_POST['entreprise_id'];

    $sql = "UPDATE publication SET titre_pub = ?, contenu_pub = ?, membre_id = ?, domaine_id = ?, entreprise_id = ? WHERE id_publication = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$titre, $contenu, $membre_id, $domaine_id, $entreprise_id, $id]);

    header('Location: publications.php');
    exit();
}

// Fetch existing record
$stmt = $pdo->prepare("SELECT * FROM publication WHERE id_publication = ?");
$stmt->execute([$id]);
$pub = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pub) {
    header('Location: publications.php');
    exit();
}

// Fetch lists for dropdowns
$membres = $pdo->query("SELECT * FROM membre")->fetchAll(PDO::FETCH_ASSOC);
$domaines = $pdo->query("SELECT * FROM domaine")->fetchAll(PDO::FETCH_ASSOC);
$entreprises = $pdo->query("SELECT * FROM entreprise")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Publication</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 600px; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: auto; }
        h2 { color: #0077b5; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], textarea, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 120px; }
        button { background: #ffc107; color: #333; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; font-size: 16px; font-weight: bold; }
        button:hover { background: #e0a800; }
        a { display: inline-block; margin-top: 15px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Publication</h2>
    <form method="POST">
        <label>Publication Title:</label>
        <input type="text" name="titre_pub" value="<?= htmlspecialchars($pub['titre_pub']) ?>" required>

        <label>Content:</label>
        <textarea name="contenu_pub" required><?= htmlspecialchars($pub['contenu_pub']) ?></textarea>

        <label>Member (Author):</label>
        <select name="membre_id" required>
            <?php foreach ($membres as $m): ?>
                <option value="<?= $m['id_membre'] ?>" <?= $m['id_membre'] == $pub['membre_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['nom_membre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Domain (Category):</label>
        <select name="domaine_id" required>
            <?php foreach ($domaines as $d): ?>
                <option value="<?= $d['id_domaine'] ?>" <?= $d['id_domaine'] == $pub['domaine_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($d['libelle_domaine']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Company:</label>
        <select name="entreprise_id" required>
            <?php foreach ($entreprises as $e): ?>
                <option value="<?= $e['id_entreprise'] ?>" <?= $e['id_entreprise'] == $pub['entreprise_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($e['nom_entreprise']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Update Publication</button>
    </form>
    <br>
    <a href="publications.php">&larr; Back to Publications List</a>
</div>
</body>
</html>