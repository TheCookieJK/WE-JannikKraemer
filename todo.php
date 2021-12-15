<?
    require_once  'components/header.php';
    require_once 'components/sidebar.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Aufgabenplaner: ToDos</title>
    <? require_once 'components/head.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <?
            render_header("Todos (Aktuelles Projekt)");
        ?>
        <!-- Page Content -->
        <div class="row g-3">

            <?
                // Sidebar
                render_sidebar("todo.php");

            ?>

            <!-- Hauptcontainer -->
            <div class="col-lg-9 col-xxl-10 container-fluid ">
                <div class="row g-3">
                    <?
                        // To Do Array
                        $todos = [
                            [
                                "id"=>1,
                                "reiter"=>"ToDo",
                                "aufgaben"=>[
                                    "HTML Datei erstellen (Max Mustermann)",
                                    "CSS Datei erstellen"
                                ]
                            ],
                            [
                                "id"=>2,
                                "reiter"=>"Erledigt",
                                "aufgaben"=>[
                                    "PC eingeschaltet (Petra Müller)",
                                    "Kaffee trinken (Petra Müller)"
                                ]
                            ],
                            [
                                "id"=>3,
                                "reiter"=>"Verschoben",
                                "aufgaben"=>[
                                    "Für die Uni lernen (Max Mustermann)"
                                ]
                            ],
                        ];

                        foreach($todos as $todo){

                            ?>
                            <div class="col-12 col-md-6 col-xl">
                                <div class="card">
                                    <div class="card-header"><?= isset($todo["reiter"]) ? $todo["reiter"] : "Aufgaben" ?>:</div>
                                    <ul class="list-group">
                                        <?
                                        if(isset($todo["aufgaben"])){
                                            foreach($todo["aufgaben"] as $aufgabe){
                                                ?>
                                                    <li class="list-group-item"><?= $aufgabe ?></li>
                                                <?
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>