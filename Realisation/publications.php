<?php
include 'db.php';

// Handle Delete Action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM publication WHERE id_publication = ?");
    $stmt->execute([$id]);
    header('Location: publications.php');
    exit();
}

// Fetch all publications with joined details
$sql = "SELECT p.*, m.nom_membre, d.libelle_domaine, e.nom_entreprise 
        FROM publication p
        JOIN membre m ON p.membre_id = m.id_membre
        JOIN domaine d ON p.domaine_id = d.id_domaine
        JOIN entreprise e ON p.entreprise_id = e.id_entreprise
        ORDER BY p.date_pub DESC";
$publications = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publications List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 1000px; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: auto; }
        h2 { color: #0077b5; display: inline-block; }
        .btn-add { float: right; background: #28a745; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-add:hover { background: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #0077b5; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-edit { background: #ffc107; color: #333; padding: 6px 12px; text-decoration: none; border-radius: 3px; font-weight: bold; }
        .btn-delete { background: #dc3545; color: white; padding: 6px 12px; text-decoration: none; border-radius: 3px; font-weight: bold; }
        .btn-edit:hover { background: #e0a800; }
        .btn-delete:hover { background: #c82333; }
    </style>
</head>
<body>
<div class="container">
    <h2>Publications Management</h2>
    <a href="add.php" class="btn-add">+ Add New Publication</a>
    <div style="clear: both;"></div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author (Membre)</th>
                <th>Domain</th>
                <th>Company</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($publications) > 0): ?>
                <?php foreach ($publications as $pub): ?>
                    <tr>
                        <td><?= $pub['id_publication'] ?></td>
                        <td><?= htmlspecialchars($pub['titre_pub']) ?></td>
                        <td><?= htmlspecialchars(substr($pub['contenu_pub'], 0, 50)) ?>...</td>
                        <td><?= htmlspecialchars($pub['nom_membre']) ?></td>
                        <td><?= htmlspecialchars($pub['libelle_domaine']) ?></td>
                        <td><?= htmlspecialchars($pub['nom_entreprise']) ?></td>
                        <td><?= $pub['date_pub'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $pub['id_publication'] ?>" class="btn-edit">Edit</a>
                            <a href="publications.php?delete=<?= $pub['id_publication'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this publication?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8" style="text-align: center;">No publications found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>