<?php
    // Incluir conexión con la base de datos
    include('config/database.php');

    // Consulta para obtener usuarios
    $query = "SELECT firstname, lastname, email, status FROM users";
    $result = pg_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet"> <!-- Asegúrate que esta hoja existe -->
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Usuarios Registrados</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                        <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo $row['status'] ? 'Activo' : 'Inactivo'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>