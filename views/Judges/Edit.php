<?php require_once __DIR__ . '/../../functions/UrlHelper.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <?php include __DIR__ . '/../partials/sidebar.php'; ?>

    <div class="container mt-5 ms-3" style="flex-grow: 1;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <h1 class="mb-4 text-center">Editar Juez</h1>
                <form action="<?php echo base_url(); ?>/judges/<?php echo htmlspecialchars($judge->id); ?>/update" method="POST">
                    <div class="mb-3">
                        <label for="id_person" class="form-label">Persona:</label>
                        <select id="id_person" name="id_person" class="form-select" required>
                            <option value="" disabled selected>Selecciona una persona</option>
                            <?php foreach ($persons as $person): ?>
                                <option value="<?= htmlspecialchars($person->id_persona); ?>" <?= $person->id_persona == $judge->id_persona ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($person->firstname . ' ' . $person->lastname); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sport" class="form-label">Deporte:</label>
                        <select name="id_sport" id="id_sport" class="form-select" required>
                        <?php foreach ($sports as $sport): ?>
                                <option value="<?= htmlspecialchars($sport->id); ?>" <?= $sport->id == $judge->sport_id ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($sport->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="certification" class="form-label">Certificación:</label>
                        <input type="text" id="certification" name="certification" class="form-control" value="<?php echo htmlspecialchars($judge->certification); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="experienceYears" class="form-label">Años de Experiencia:</label>
                        <input type="number" id="experienceYears" name="experienceYears" class="form-control" min="0" max="99" value="<?php echo htmlspecialchars($judge->experienceyears); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">País:</label>
                        <select name="id_country" id="id_country" class="form-select" required>
                            <?php foreach ($countries as $country): ?>
                                <option value="<?= htmlspecialchars($country->id); ?>" <?= $country->id == $judge->country_id ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($country->name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Actualizar Juez</button>
                </form>

                <a href="<?php echo base_url(); ?>/judges" class="btn btn-secondary w-100 mt-3">Volver al listado</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
