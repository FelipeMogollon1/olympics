<?php
require_once __DIR__ . '/../../functions/UrlHelper.php';

// Obtén la ruta actual
$currentPage = basename($_SERVER['REQUEST_URI']);
?>

<style>
    .nav-link:hover {
        background-color: #444;
        color: #fff;
    }
</style>
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="height: 100vh; width: 280px;">
    <img src="https://www.utp.edu.co/assets/img/escudos/identificadorNew.png" width="220" alt="Escudo Universidad Tecnologica de Pereira">
    <hr>

    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="<?php echo base_url(); ?>/judges" class="nav-link <?php echo ($currentPage == 'judges' || strpos($currentPage, 'judges') !== false) ? 'active' : ''; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#house"></use></svg>
                Jueces
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url(); ?>/people" class="nav-link <?php echo ($currentPage == 'people' || strpos($currentPage, 'people') !== false) ? 'active' : ''; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people"></use></svg>
                Personas
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url(); ?>/sports" class="nav-link <?php echo ($currentPage == 'sports' || strpos($currentPage, 'sports') !== false) ? 'active' : ''; ?>" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#sports"></use></svg>
                Deportes
            </a>
        </li>

    </ul>
</div>


