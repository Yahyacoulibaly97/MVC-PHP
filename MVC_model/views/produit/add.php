<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form method="POST">
        <input type="text" name="libelle" placeholder="Libellé" required>
        <input type="number" name="quantite" placeholder="Quantité" required>
        <input type="number" step="0.01" name="prix_unitaire" placeholder="Prix Unitaire" required>
        <select name="id_cat" required>
            <?php
            // Récupérer les catégories pour le menu déroulant
            $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $categorie):
            ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>