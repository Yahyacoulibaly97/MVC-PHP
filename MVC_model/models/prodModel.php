
<?php
    function createProduit($pdo, $libelle, $quantite, $prix_unitaire, $id_cat) {
        $stmt = $pdo->prepare("INSERT INTO product (libelle, quantite, prix_unit, id_cat) VALUES (:libelle, :quantite, :prix_unit, :id_cat)");
        return $stmt->execute(['libelle' => $libelle, 'quantite' => $quantite, 'prix_unit' => $prix_unitaire, 'id_cat' => $id_cat]);
    }

    function readProduits($pdo) {
        $stmt = $pdo->query("SELECT p.*, c.libelle AS categorie FROM product p LEFT JOIN categorie c ON p.id_cat = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateProduit($pdo, $id, $libelle, $quantite, $prix_unitaire, $id_cat) {
        $stmt = $pdo->prepare("UPDATE product SET libelle = :libelle, quantite = :quantite, prix_unit = :prix_unit, id_cat = :id_cat WHERE id = :id");
        return $stmt->execute(['libelle' => $libelle, 'quantite' => $quantite, 'prix_unit' => $prix_unitaire, 'id_cat' => $id_cat, 'id' => $id]);
    }

    function deleteProduit($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM product WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }


?>