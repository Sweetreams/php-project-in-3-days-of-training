<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php if($_SERVER["SCRIPT_NAME"] == "/index.php"):?>
            <li><a class="nav-link px-2 link-secondary" href="./index.php">Главня страница</a></li>
            <li><a class="nav-link px-2" href="./add_post.php">Добавить запись</a></li>
        <?php else: ?>
            <li><a class="nav-link px-2" href="./index.php">Главня страница</a></li>
            <li><a class="nav-link px-2 link-secondary" href="./add_post.php">Добавить запись</a></li>
        <?php endif;?>
    </ul>

    <div class="col-md-3 text-end">
        <?php if(!$_COOKIE["JWS"]): ?>
            <a type="button" class="btn btn-outline-primary me-2" href="./sign-in.php">Login</a>
            <a type="button" class="btn btn-primary" href="./sign-up.php">Sign-up</a>
        <?php else: ?>
            <a type="button" class="btn btn-primary" href="./exit.php">Exit</a>
        <?php endif; ?>
    </div>
</header>