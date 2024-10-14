<?php
class User {
    public function checkUser($username, $password) {
        include('Connect.php');
        $sql = 'SELECT * FROM users WHERE username = ? AND password = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);
        return $stmt->fetch();
    }

    public function registerUser($username, $password) {
        include('Connect.php');
        $sql = 'SELECT * FROM users WHERE username = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            return false; // Username already exists
        } else {
            $sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $password]);
            return true;
        }
    }
}
?>
