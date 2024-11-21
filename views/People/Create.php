<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-5">
            <h1 class="mb-4 text-center">Crear Persona</h1>
            <form action="<?php echo base_url(); ?>/people" method="POST" class="card p-4 shadow">
                <!-- Campo Nombre -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">Nombre:</label>
                    <input type="text" id="firstName" name="firstName" class="form-control" required>
                </div>

                <!-- Campo Apellido -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Apellido:</label>
                    <input type="text" id="lastName" name="lastName" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label for="gender" class="form-label">Género:</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="" disabled selected>Selecciona un género</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control" required>
                </div>


                <div class="mb-3">
                    <label for="countryId" class="form-label">País:</label>
                    <select id="countryId" name="countryId" class="form-select" required>
                        <option value="" disabled selected>Selecciona un país</option>


                        <option value="1">México</option>
                        <option value="2">Estados Unidos</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Guardar Persona</button>
            </form>

            <a href="<?php echo base_url(); ?>/people" class="btn btn-secondary w-100 mt-3">Volver al listado</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
