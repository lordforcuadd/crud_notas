<?php
include 'db.php';

$id = $_GET['id'] ?? null; 

if ($id) {
    $result = $conn->query("SELECT * FROM notas WHERE id = $id");
    $nota = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];

        $sql = "UPDATE notas SET titulo='$titulo', contenido='$contenido' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "ID de nota no especificado.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Nota</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <h2>Editar Nota</h2>
    <form method="POST">
        <input type="text" name="titulo" value="<?php echo $nota['titulo']; ?>" required>
        <textarea name="contenido" required><?php echo $nota['contenido']; ?></textarea>
        <button type="submit"><i class='bx bx-refresh'></i> Actualizar</button>
    </form>
    <a class="text1" href="index.php"><i class='bx bx-arrow-back'></i> Volver</a>
</body>
</html>


