<!DOCTYPE html>
<html>
<head>
    <title>Éditer une catégorie</title>
</head>
<body>
    <h1>Éditer une catégorie</h1>
    <form method="POST">
        <input type="text" name="libelle" value="<?= $categorie['libelle'] ?>" required>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>