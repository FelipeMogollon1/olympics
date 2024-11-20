<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container mt-5 ms-3" style="flex-grow: 1;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h1 class="mb-4 text-center">Editar Juez</h1>
                <form action="<?php echo base_url(); ?>/judges/<?php echo $judge->id; ?>/update" method="POST">
                    <!-- Nombre Completo -->
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nombre Completo:</label>
                        <input type="text" id="fullName" name="fullName" class="form-control" value="<?php echo $judge->fullname; ?>" required>
                    </div>

                    <!-- Edad (solo lectura) -->
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="number" id="edad" name="edad" class="form-control" value="<?php echo $judge->edad; ?>" readonly>
                    </div>

                    <!-- Deporte -->
                    <div class="mb-3">
                        <label for="sport" class="form-label">Deporte:</label>
                        <select name="sport" id="sport" class="form-select" required>
                            <?php foreach ($sports as $sport): ?>
                                <option value="<?= $sport->id; ?>"
                                    <?= $sport->id == $judge->sport_id ? 'selected' : ''; ?>>
                                    <?= $sport->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Certificación -->
                    <div class="mb-3">
                        <label for="certification" class="form-label">Certificación:</label>
                        <input type="text" id="certification" name="certification" class="form-control" value="<?php echo $judge->certification; ?>" required>
                    </div>

                    <!-- Años de Experiencia -->
                    <div class="mb-3">
                        <label for="experienceYears" class="form-label">Años de Experiencia:</label>
                        <input type="number" id="experienceYears" name="experienceYears" class="form-control" value="<?php echo $judge->experienceyears; ?>" required>
                    </div>

                    <!-- País -->
                    <div class="mb-3">
                        <label for="country" class="form-label">País:</label>
                        <select name="country" id="country" class="form-select" required>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?= $country->id; ?>"
                                    <?= $country->id == $judge->country_id ? 'selected' : ''; ?>>
                                    <?= $country->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Botón de actualizar -->
                    <button type="submit" class="btn btn-primary w-100">Actualizar Juez</button>
                </form>

                <!-- Botón Volver -->
                <a href="<?php echo base_url(); ?>/judges" class="btn btn-secondary w-100 mt-3">Volver al listado</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
