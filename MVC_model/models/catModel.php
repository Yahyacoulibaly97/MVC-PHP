<?php
    function createCategorie($pdo, $libelle) {
        $stmt = $pdo->prepare("INSERT INTO categorie (libelle) VALUES (:libelle)");
        return $stmt->execute(['libelle' => $libelle]);
    }

    function readCategories($pdo) {
        $stmt = $pdo->query("SELECT * FROM categorie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateCategorie($pdo, $id, $libelle) {
        $stmt = $pdo->prepare("UPDATE categorie SET libelle = :libelle WHERE id = :id");
        return $stmt->execute(['libelle' => $libelle, 'id' => $id]);
    }

    function deleteCategorie($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM categorie WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }


?>