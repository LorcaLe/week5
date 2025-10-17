<?php
if (isset($_POST['joketext'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $imagePath = null;

        if (!empty($_FILES['image']['name'])) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $imageName = time() . '_' . basename($_FILES['image']['name']);
            $targetFile = $uploadDir . $imageName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = $targetFile;
            }
        }

        $sql = 'INSERT INTO joke (joketext, jokedate, image)
                VALUES (:joketext, CURDATE(), :image)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':image', $_POST['image']);
        $stmt->execute();


        header('location: jokes.php');
        exit;
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a new Joke';
    ob_start();
    include 'templates/addjoke.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>
