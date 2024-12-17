<?php
    $host = "localhost";
    $port = "5432";
    $user = "postgres";
    $pwd = "Bamby1998";
    $dbname = "model_mvc";

    try {
        // Créer une connexion PDO
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname"; // DSN pour PostgreSQL
        $pdo = new PDO($dsn, $user, $pwd);
        
        // Définir le mode d'erreur PDO pour lancer des exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // echo "Connexion réussie à la base de données.";
    } catch (PDOException $e) {
        // Gérer l'erreur de connexion
        echo "Erreur de connexion : " . $e->getMessage();
    }
?>