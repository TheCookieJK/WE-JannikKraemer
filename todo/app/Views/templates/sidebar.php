<div class="col-lg-3 col-xxl-2">
    <ul class="list-group p-2 sidenav">
        <li class="list-group-item">
            <a href="<?= base_url() ?>/logout" class="d-block">
                <i class="icon fas fa-user"></i>
                <span class="text">Abmelden</span>
            </a>
        </li>
        <li class="list-group-item <?= $page == "projekte" ? 'selected' : ''; ?>">
            <a href="<?= base_url() . '/projekte' ?>" class="d-block">
                <i class="icon fas fa-layer-group"></i>
                <span class="text">Projekte</span>
            </a>
        </li>
        <? if(isset(session()->projekt) && session()->projekt != 0){?>
        <li class="list-group-item <?= $page == "todo" ? 'selected' : ''; ?>">
            <a href="<?= base_url() . '/todos' ?>" class="d-block">
                <i class="icon fas fa-clipboard"></i>
                <span class="text">Aktuelles Projekt</span>
            </a>
        </li>
        <li class="list-group-item <?= $page == 'reiter' ? 'selected' : ''; ?>">
            <a href="<?= base_url() . '/reiter' ?>" class="d-block ms-4">
                <i class="icon fas fa-columns"></i>
                <span class="text">Reiter</span>
            </a>
        </li>
        <li class="list-group-item <?= $page == 'aufgaben' ? 'selected' : ''; ?>">
            <a href="<?= base_url() . '/aufgaben' ?>" class="d-block ms-4">
                <i class="icon fas fa-tasks"></i>
                <span class="text">Aufgaben</span>
            </a>
        </li>
        <li class="list-group-item <?= $page == 'personen' ? 'selected' : ''; ?>">
            <a href="<?= base_url() . '/mitglieder' ?>" class="d-block ms-4">
                <i class="icon fas fa-users"></i>
                <span class="text">Mitglieder</span>
            </a>
        </li>
        <?}?>
    </ul>
</div>