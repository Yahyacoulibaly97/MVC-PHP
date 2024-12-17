<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des catégories</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Intégration de Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?action=read&type=users">User</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=read&type=produit">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=read&type=categorie">Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>
    <!-- Conteneur principal -->
    <div class="container mt-5">
        <!-- Bouton de retour -->
        <!-- Titre principal et bouton Ajouter -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Liste des catégories</h1>
            <a href="index.php?action=create&&type=categorie" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Ajouter une catégorie
            </a>
        </div>

        <!-- Tableau des catégories -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Libellé</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $categorie): ?>
                    <tr>
                        <td><?= htmlspecialchars($categorie['id']) ?></td>
                        <td><?= htmlspecialchars($categorie['libelle']) ?></td>
                        <td>
                            <!-- Bouton Éditer -->
                            <a href="index.php?action=edit&&type=categorie&id=<?= $categorie['id'] ?>" 
                               class="btn btn-sm btn-success" title="Éditer">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <!-- Bouton Supprimer -->
                            <a href="index.php?action=delete&&type=categorie&id=<?= $categorie['id'] ?>" 
                               class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS et Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
