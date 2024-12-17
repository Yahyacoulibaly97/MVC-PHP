<?php
    require_once 'models/db.php';
    require_once 'models/prodModel.php';
    function handleCreate($pdo) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $quantite = $_POST['quantite'];
            $prix_unitaire = $_POST['prix_unitaire'];
            $id_cat = $_POST['id_cat'];

            if (createProduit($pdo, $libelle, $quantite, $prix_unitaire, $id_cat)) {
                header('Location: index.php?action=read');
                exit;
            } else {
                echo "Erreur lors de l'ajout du produit.";
            }
        }
    }

    function handleRead($pdo) {
        $produits = readProduits($pdo);
        include './views/produit/list.php';
    }

    function handleUpdate($pdo, $id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'];
            $quantite = $_POST['quantite'];
            $prix_unitaire = $_POST['prix_unitaire'];
            $id_cat = $_POST['id_cat'];

            if (updateProduit($pdo, $id, $libelle, $quantite, $prix_unitaire, $id_cat)) {
                header('Location: index.php?action=read');
                exit;
            } else {
                echo "Erreur lors de la mise à jour du produit.";
            }
        }

        $produit = getProduitById($pdo, $id);
        include 'views/update_product.php'; // Inclure la vue pour éditer un produit
    }

    function handleDelete($pdo, $id) {
        if (deleteProduit($pdo, $id)) {
            header('Location: index.php?action=read');
            exit;
        } else {
            echo "Erreur lors de la suppression du produit.";
        }
    }

    function getProduitById($pdo, $id) {
        $stmt = $pdo->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>