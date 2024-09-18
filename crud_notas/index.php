<?php
include 'db.php';

// Realiza la consulta
$result = $conn->query("SELECT * FROM notas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Notas</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <h2>Notas</h2>
    <a href="crear.php"><i class='bx bx-plus'></i> Crear Nueva Nota</a>
    <table>
        <tr>
            <th>Título</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['contenido']; ?></td>
                    <td>
                        <a class="b1" href="editar.php?id=<?php echo $row['id']; ?>"><i class='bx bx-edit'></i> Editar</a>
                        <a class="b2" href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?');"><i class='bx bx-trash'></i> Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No hay notas disponibles</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close(); // Cierra la conexión
?>

