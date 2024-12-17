<?php
require_once 'models/db.php';
require_once 'models/userModel.php';

function handleCreateUser($pdo) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (createUser($pdo, $username, $password, $email)) {
            header('Location: index.php?action=readUsers');
            exit;
        } else {
            echo "Erreur lors de l'ajout de l'utilisateur.";
        }
    }
    include 'views/create_user.php'; // Inclure la vue pour ajouter un utilisateur
}

function handleReadUsers($pdo) {
    $users = readUsers($pdo);
    include './views/users/list.php'; // Inclure la vue pour afficher les utilisateurs
}

function handleUpdateUser($pdo, $id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (updateUser($pdo, $id, $username, $password, $email)) {
            header('Location: index.php?action=users');
            exit;
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur.";
        }
    }

    $user = getUserById($pdo, $id);
    include 'views/update_user.php'; // Inclure la vue pour éditer un utilisateur
}

function handleDeleteUser($pdo, $id) {
    if (deleteUser($pdo, $id)) {
        header('Location: index.php?action=read&type=users');
        exit;
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
}

function getUserById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>