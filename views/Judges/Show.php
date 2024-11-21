<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Juez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm p-4">
                <h1 class="mb-4 text-center">Detalles del Juez</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información del Juez</h5>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Nombre Completo</th>
                                <td><?php echo $judge->fullname; ?></td>
                            </tr>
                            <tr>
                                <th>Edad</th>
                                <td><?php echo $judge->edad; ?> años</td>
                            </tr>
                            <tr>
                                <th>Deporte</th>
                                <td><?php echo $judge->sport; ?></td>
                            </tr>
                            <tr>
                                <th>Certificación</th>
                                <td><?php echo $judge->certification; ?></td>
                            </tr>
                            <tr>
                                <th>Años de Experiencia</th>
                                <td><?php echo $judge->experienceyears; ?> años</td>
                            </tr>
                            <tr>
                                <th>País</th>
                                <td><?php echo $judge->country; ?> , <?php echo $judge->continent; ?></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?php echo base_url(); ?>/judges/<?php echo $judge->id; ?>/edit" class="btn btn-warning">Editar</a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo $judge->id; ?>">
                                Eliminar
                            </button>

                            <a href="<?php echo base_url(); ?>/judges" class="btn btn-secondary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal-<?php echo $judge->id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar a este juez?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="<?php echo base_url(); ?>/judges/<?php echo $judge->id; ?>/delete" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>