<?php
require_once __DIR__ . '/../config.php';

class Reclamation
{
    public static function save($name, $email, $phone, $bugtype, $message)
    {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("INSERT INTO reclamation (name, email, phone, bugtype, message) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$name, $email, $phone, $bugtype, $message]);
        } catch (PDOException $e) {
            error_log("DB Error: " . $e->getMessage());
            return false;
        }
    }

    public static function getAll()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM reclamation ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function delete($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM reclamation WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
