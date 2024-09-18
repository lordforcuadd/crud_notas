<?php
include 'db.php';

$id = $_GET['id'] ?? null; // 

if ($id) {
    $sql = "DELETE FROM notas WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID de nota no especificado.";
    exit();
}

$conn->close();
?>
