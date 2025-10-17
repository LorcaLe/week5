<?php
include 'includes/DatabaseConnection.php';
$id = $_GET['Id'] ?? 0;

$stmt = $pdo->prepare('SELECT image FROM joke WHERE Id = :Id');
$stmt->bindValue(':Id', $id);
$stmt->execute();

$row = $stmt->fetch();
if ($row && !empty($row['image'])) {
    header('Content-Type: image/jpeg');
    echo $row['image'];
}
?>
