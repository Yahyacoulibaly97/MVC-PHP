<?php
require_once 'models/db.php';
include 'controllers/categorie.php';
include 'controllers/produit.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                createCategorie($pdo, $_POST['libelle']);
                header("Location: index.php");
            }
            include './views/categorie/add.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateCategorie($pdo, $id, $_POST['libelle']);
                header("Location: index.php");
            }
            $categorie = $pdo->query("SELECT * FROM categorie WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
            include './views/categorie/edit.php';
            break;
        case 'delete':
            deleteCategorie($pdo, $_GET['id']);
            header("Location: index.php");
            break;
        default:
            $categories = readCategories($pdo);
            include '../views/index.php';
            break;
    }
} else {
    $categories = readCategories($pdo);
    include './views/categorie/list.php';
}
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                createProduit($pdo, $_POST['libelle'], $_POST['quantite'], $_POST['prix_unitaire'], $_POST['id_cat']);
                header("Location: index.php");
            }
            include './views/produit/add.php';
            break;
        case 'edit':
            $id = $_GET['id'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                updateProduit($pdo, $id, $_POST['libelle'], $_POST['quantite'], $_POST['prix_unitaire'], $_POST['id_cat']);
                header("Location: index.php");
            }
            $produit = $pdo->query("SELECT * FROM product WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
            include './views/produit/edit.php';
            break;
        case 'delete':
            deleteProduit($pdo, $_GET['id']);
            header("Location: index.php");
            break;
        case 'read':
        default:
            $produits = readProduits($pdo);
            include '../views/index_produit.php';
            break;
    }
} else {
    $produits = readProduits($pdo);
    include './views/produit/list.php';
}
?>
