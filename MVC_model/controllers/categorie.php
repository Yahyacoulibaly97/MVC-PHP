<?php
    require_once 'models/db.php';
    require_once 'models/catModel.php';
    // Fonctions de contrôleur pour gérer les catégories
    function handleCreateCategorie($pdo) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];

            if (createCategorie($pdo, $libelle)) {
                header('Location: index.php?action=read&&type=categorie');
                exit;
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
        include 'views/create_category.php'; // Inclure la vue pour ajouter une catégorie
    }

    function handleReadCategories($pdo) {
        $categories = readCategories($pdo);
        include './views/categorie/list.php'; // Inclure la vue pour afficher les catégories
    }

    function handleUpdateCategorie($pdo, $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            if (updateCategorie($pdo, $id, $libelle)) {
                header('Location: index.php?action=read&&type=categorie');
                exit;
            } else {
                echo "Erreur lors de la mise à jour de la catégorie.";
            }
        }

        $categorie = getCategorieById($pdo, $id);
        include 'views/update_category.php'; // Inclure la vue pour éditer une catégorie
    }

    function handleDeleteCategorie($pdo, $id) {
        if (deleteCategorie($pdo, $id)) {
            header('Location: index.php?action=read&&type=categorie');
            exit;
        } else {
            echo "Erreur lors de la suppression de la catégorie.";
        }
    }

    function getCategorieById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM categorie WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
