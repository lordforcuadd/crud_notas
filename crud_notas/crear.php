<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];

    $sql = "INSERT INTO notas (titulo, contenido) VALUES ('$titulo', '$contenido')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nota</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <h2>Crear Nota</h2>
    <form method="POST">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="contenido" placeholder="Contenido" required></textarea>
        <button type="submit"><i class='bx bx-save'></i> Guardar</button>
    </form>
    <a class="text1" href="index.php"><i class='bx bx-arrow-back'></i> Volver</a>
</body>
</html>

