<?php
try {
    include 'includes/DatabaseConnection.php';

    $sql = 'DELETE FROM joke WHERE Id = :Id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':Id', $_POST['Id']);
    $stmt->execute();

    header('location: jokes.php');
    exit;
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
    include 'templates/layout.html.php';
}
?>
