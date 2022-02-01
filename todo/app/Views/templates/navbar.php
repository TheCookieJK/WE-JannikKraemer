<nav class="navbar navbar-expand navbar-light bg-light rounded mb-3">

    <div class="container-fluid ">
        <ul class="navbar-nav me-auto gap-2 ">
            <li class="nav-item">
                <a href="<?= base_url() . '/projekte' ?>" class="nav-link hover-item">
                    <i class="icon fas fa-layer-group"></i>
                    <span class="text">Projekte</span>
                </a>
            </li>

            <li class="nav-item dropdown">

                <?

                if (isset(session()->projekt) && session()->projekt !== 0) {
                    $projektModel = new \App\Models\ProjektModel();
                    $projekt = $projektModel->find(session()->projekt);
                    if ($projekt != null) {
                        ?>
                        <a class="nav-link dropdown-toggle hover-item" href="#" id="projektDropdown" role="button"
                           data-bs-toggle="dropdown">
                            <?= $projekt['name'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="projektDropdown">
                            <li>
                                <a href="<?= base_url() . '/todos' ?>" class="d-block dropdown-item hover-item">
                                    <i class="icon fas fa-clipboard"></i>
                                    <span class="text">Projektübersicht</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a href="<?= base_url() . '/reiter' ?>" class="d-block dropdown-item hover-item">
                                    <i class="icon fas fa-columns"></i>
                                    <span class="text">Reiter</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url() . '/aufgaben' ?>" class="d-block dropdown-item hover-item">
                                    <i class="icon fas fa-tasks"></i>
                                    <span class="text">Aufgaben</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url() . '/mitglieder' ?>" class="d-block dropdown-item hover-item">
                                    <i class="icon fas fa-users"></i>
                                    <span class="text">Mitglieder</span>
                                </a>
                            </li>
                        </ul>
                        <?
                    }
                } else {
                    ?>
                    <a class="nav-link" onclick="focusSelector()" role="button">- Kein Projekt ausgewählt -</a>
                    <?
                }
                ?>

            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-primary" href="<?= base_url() ?>/logout">
                    <i class="fas fa-sign-out-alt d-md-none"></i>
                    <span class="d-md-block d-none">Abmelden</span>
                </a>
            </li>
        </ul>

    </div>

</nav>

<script>
    function focusSelector() {
        let el = document.getElementById("projectSelector")
        if (el !== undefined) {
            el.focus()
        }
    }
</script>