<?php
require_once 'models/db.php';
require_once './controllers/produit.php';
require_once './controllers/categorie.php';
require_once './controllers/userControllers.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'produit';
$action = isset($_GET['action']) ? $_GET['action'] : 'read';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($type === 'categorie') {
                handleCreateCategorie($pdo);
            } elseif ($type === 'produit') {
                handleCreate($pdo);
            }
            header("Location: index.php?type=$type");
            exit;
        }
        include "./views/$type/add.php";
        break;
    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($type === 'categorie') {
                handleUpdateCategorie($pdo, $id);
            }
            if ($type === 'users') {
                handleUpdateUser($pdo, $id);
            } elseif ($type === 'produit') {
                handleUpdate($pdo, $id);
            }
            header("Location: index.php?type=$type");
            exit;
        }
        if ($type === 'categorie') {
            getCategorieById($pdo, $id);
            // $categorie = $pdo->query("SELECT * FROM categorie WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
        } 
        if ($type === 'users') {
            getUserById($pdo, $id);
            // $categorie = $pdo->query("SELECT * FROM categorie WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
        } 
        elseif ($type === 'produit') {
            getProduitById($pdo, $id);
            // $produit = $pdo->query("SELECT * FROM product WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
        }
        include "./views/$type/edit.php";
        break;

    case 'delete':
        $id = $_GET['id'];
        if ($type === 'categorie') {
            handleDeleteCategorie($pdo, $id);
        }
        if ($type === 'users') {
                handleDeleteUser($pdo, $id);
        } elseif ($type === 'produit') {
            handleDelete($pdo, $id);
        }
        header("Location: index.php?type=$type");
        exit;

    case 'read':
    default:
        if ($type === 'categorie') {
            $categories = handleReadCategories($pdo);
        }
        if ($type === 'users') {
            $categories = handleReadUsers($pdo);
        } elseif ($type === 'produit') {
            // include_once './views/header.php';
            $produits = handleRead($pdo);
        }
        break;
}
?>
