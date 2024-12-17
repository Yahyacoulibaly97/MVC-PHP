<?php
    function createUser($pdo, $username, $password, $email) {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        return $stmt->execute([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email
        ]);
    }
    function readUsers($pdo) {
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateUser($pdo, $id, $username, $password, $email) {
        $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email" . ($password ? ", password = :password" : "") . " WHERE id = :id");
        $params = ['username' => $username, 'email' => $email, 'id' => $id];
        if ($password) {
            $params['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        return $stmt->execute($params);
    }

    function deleteUser($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }


?>