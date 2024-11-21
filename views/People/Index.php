<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container mt-5 ms-3" style="flex-grow: 1;">
        <h1 class="mb-4">Listado de Personas</h1>
        <a href="<?php echo base_url(); ?>/people/create" class="btn btn-primary mb-3">Crear nueva persona</a>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Género</th>
                <th>Fecha de Nacimiento</th>
                <th>País</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($people)): ?>
                <?php foreach ($people as $person): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($person->firstname); ?></td>
                        <td><?php echo htmlspecialchars($person->lastname); ?></td>
                        <td><?php echo htmlspecialchars($person->gender); ?></td>
                        <td><?php echo htmlspecialchars($person->birthdate); ?></td>
                        <td><?php echo htmlspecialchars($person->countryname); ?></td>
                        <td><?php echo htmlspecialchars($person->continent); ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>/people/<?php echo $person->id_persona; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="<?php echo base_url(); ?>/people/<?php echo $person->id_persona; ?>/edit" class="btn btn-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo $person->id_persona; ?>">Eliminar</button>

                            <div class="modal fade" id="deleteModal-<?php echo $person->id_persona; ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo $person->id_persona; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-<?php echo $person->id_persona; ?>">Confirmar eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Está seguro de que desea eliminar a <?php echo htmlspecialchars($person->firstname . ' ' . $person->lastname); ?>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="<?php echo base_url(); ?>/people/<?php echo $person->id_persona; ?>/delete" method="POST">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No hay personas registradas.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
