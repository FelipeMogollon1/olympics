<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Juez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6 col-lg-5">
            <h1 class="mb-4 text-center">Crear Juez</h1>
            <form action="<?php echo base_url(); ?>/judges" method="POST" class="card p-4 shadow">

                <div class="mb-3">
                    <label for="id_person" class="form-label">Persona:</label>
                    <select id="id_person" name="id_person" class="form-select" required>
                        <option value="" disabled selected>Selecciona una persona</option>
                        <?php foreach ($persons as $person): ?>
                            <option value="<?php echo htmlspecialchars($person->id_persona); ?>">
                                <?php echo htmlspecialchars($person->firstname . ' ' . $person->lastname); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_sport" class="form-label">Deporte:</label>
                    <select id="id_sport" name="id_sport" class="form-select" required>
                        <option value="" disabled selected>Selecciona un deporte</option>
                        <?php foreach ($sports as $sport): ?>
                            <option value="<?php echo htmlspecialchars($sport->id); ?>">
                                <?php echo htmlspecialchars($sport->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="certification" class="form-label">Certificación:</label>
                    <input type="text" id="certification" name="certification" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="experienceYears" class="form-label">Años de Experiencia:</label>
                    <input type="number" id="experienceYears" name="experienceYears" class="form-control" min="0" max="99" required>
                </div>

                <div class="mb-3">
                    <label for="id_country" class="form-label">País:</label>
                    <select id="id_country" name="id_country" class="form-select" required>
                        <option value="" disabled selected>Selecciona un país</option>
                        <?php foreach ($countries as $country): ?>
                            <option value="<?php echo htmlspecialchars($country->id); ?>">
                                <?php echo htmlspecialchars($country->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Guardar Juez</button>
            </form>
            <a href="<?php echo base_url(); ?>/judges" class="btn btn-secondary w-100 mt-3">Volver al listado</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
