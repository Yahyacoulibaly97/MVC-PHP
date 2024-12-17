<!DOCTYPE html>
<html>
<head>
    <title>Éditer un produit</title>
</head>
<body>
    <h1>Éditer un produit</h1>
    <form method="POST">
        <input type="text" name="libelle" value="<?= $produit['libelle'] ?>" required>
        <input type="number" name="quantite" value="<?= $produit['quantite'] ?>" required>
        <input type="number" step="0.01" name="prix_unitaire" value="<?= $produit['prix_unit'] ?>" required>
        <select name="id_cat" required>
            <?php
            // Récupérer les catégories pour le menu déroulant
            $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $categorie):
            ?>
                <option value="<?= $categorie['id'] ?>" <?= $produit['id_cat'] == $categorie['id'] ? 'selected' : '' ?>><?= $categorie['libelle'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>