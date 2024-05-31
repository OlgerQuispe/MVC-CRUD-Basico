<!DOCTYPE html>
<html>
<head>
    <title>Lista de Contactos</title>
</head>
<body>
    <h1>Lista de Contactos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php if (!empty($contactos)): ?>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contacto['id']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($contacto['email']); ?></td>
                    <td>
                        <form method="post" action="index.php">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($contacto['id']); ?>">
                            <button type="submit" name="submit">Eliminar</button>
                        </form>
                        <form method="post" action="index.php">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($contacto['id']); ?>">
                            <input type="text" name="nombre" value="<?php echo htmlspecialchars($contacto['nombre']); ?>" required>
                            <input type="text" name="telefono" value="<?php echo htmlspecialchars($contacto['telefono']); ?>" required>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($contacto['email']); ?>" required>
                            <button type="submit" name="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No se encontraron contactos.</td>
            </tr>
        <?php endif; ?>
    </table>
    <h1>Agregar Contacto</h1>
    <form method="post" action="index.php">
        <input type="hidden" name="_method" value="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="submit">Agregar Contacto</button>
    </form>
</body>
</html>
