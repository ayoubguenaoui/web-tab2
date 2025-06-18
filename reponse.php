<?php
require_once __DIR__ . '/../config.php';

class Reponse
{
    public static function add($id, $name, $reponse, $status)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO reponse (id, name, reponse, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$id, $name, $reponse, $status]);
    }

    public static function getAll()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM reponse ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public static function update($id, $name, $reponse, $status)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE reponse SET name = ?, reponse = ?, status = ? WHERE id = ?");
        return $stmt->execute([$name, $reponse, $status, $id]);
    }
}