<?php
require __DIR__ . '/includes/conexion.php';

$Pacientes = $pdo->query('SELECT id, nombre, apellido, correo, telefono, creado_en FROM Pacientes ORDER BY id DESC')->fetchAll();

$mensajes = [
    'creado'     => 'Paciente creado correctamente.',
    'actualizado'=> 'Paciente actualizado correctamente.',
    'eliminado'  => 'Paciente eliminado correctamente.',
];
$msg = $_GET['msg'] ?? '';

require __DIR__ . '/includes/header.php';
?>

<?php if (isset($mensajes[$msg])): ?>
    <div class="mensaje"><?= htmlspecialchars($mensajes[$msg]) ?></div>
<?php endif; ?>

<div class="barra">
    <h2>Listado de pacientes (<?= count($Pacientes) ?>)</h2>
    <a class="btn" href="crear.php">Nuevo paciente</a>
</div>

<?php if (empty($Pacientes)): ?>
    <div class="vacio">No hay pacientes registrados.</div>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($Pacientes as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']) ?></td>
                <td><?= htmlspecialchars($u['correo']) ?></td>
                <td><?= htmlspecialchars($u['telefono'] ?? '—') ?></td>
                <td><?= htmlspecialchars($u['creado_en']) ?></td>
                <td class="acciones">
                    <a class="btn btn-claro btn-sm" href="editar.php?id=<?= $u['id'] ?>">Editar</a>
                    <form method="post" action="eliminar.php"
                          onsubmit="return confirm('¿Eliminar este paciente?');">
                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <button type="submit" class="btn btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
