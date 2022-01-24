<?php
function render_sidebar($selected = 'todo'){
    $pages = [
        [
            'link' => 'login.php',
            'title' => 'Login',
            'icon' => 'fas fa-user'
        ],
        [
            'link' => 'projekte.php',
            'title' => 'Projekte',
            'icon' => 'fas fa-layer-group'
        ],
        [
            'link' => 'todo.php',
            'title' => 'Aktuelles Projekt',
            'icon' => 'fas fa-clipboard'
        ],
        [
            'link' => 'reiter.php',
            'title' => 'Reiter',
            'icon' => 'fas fa-columns',
            'submenu' =>true
        ],
        [
            'link' => 'aufgaben.php',
            'title' => 'Aufgaben',
            'icon' => 'fas fa-tasks',
            'submenu' =>true,
        ],
        [
            'link' => 'personen.php',
            'title' => 'Mitglieder',
            'icon' => 'fas fa-users',
            'submenu' =>true
        ],
    ];

    ?>
    <div class="col-lg-3 col-xxl-2">
        <ul class="list-group p-2 sidenav">
            <?php
                foreach($pages as $page){
                    ?>
                        <li class="list-group-item <?= $page['link'] == $selected ? 'selected' : ''; ?>">
                            <a href="<?= $page['link']; ?>" class="d-block <?= isset($page['submenu']) && $page['submenu'] ? 'ms-4' : ''; ?>">
                                <i class="icon <?= $page['icon']; ?>"></i>
                                <span class="text"><?= $page['title'] ?></span>
                            </a>
                        </li>
                    <?php
                }
            ?>
        </ul>

    </div>
    <?php
}
?>