<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container mt-5 ms-3" style="flex-grow: 1;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h1 class="mb-4 text-center">Editar Persona</h1>
                <form action="<?php echo base_url(); ?>/people/<?php echo $person->id_persona; ?>/update" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Nombre:</label>
                        <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo htmlspecialchars($person->firstname); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="lastName" class="form-label">Apellido:</label>
                        <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo htmlspecialchars($person->lastname); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Género:</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="M" <?php echo $person->gender == 'M' ? 'selected' : ''; ?>>Masculino</option>
                            <option value="F" <?php echo $person->gender == 'F' ? 'selected' : ''; ?>>Femenino</option>
                            <option value="O" <?php echo $person->gender == 'O' ? 'selected' : ''; ?>>Otro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="<?php echo htmlspecialchars($person->birthdate); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="countryId" class="form-label">País:</label>
                        <select id="countryId" name="countryId" class="form-select" required>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?= $country->id; ?>"
                                    <?= $country->id == $person->countryId ? 'selected' : ''; ?>>
                                    <?= $country->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Actualizar Persona</button>
                </form>

                <a href="<?php echo base_url(); ?>/people" class="btn btn-secondary w-100 mt-3">Volver al listado</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
