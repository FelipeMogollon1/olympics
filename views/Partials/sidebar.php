<?php
require_once __DIR__ . '/../../functions/UrlHelper.php';
?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="height: 100vh; width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">CRUD</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="<?php echo base_url(); ?>/judges" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#house"></use></svg>
                Jueces
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo base_url(); ?>/sports" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#house"></use></svg>
                Deportes
            </a>
        </li>

    </ul>
</div>
