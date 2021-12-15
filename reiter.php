<?
    require_once  'components/header.php';
    require_once 'components/sidebar.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Aufgabenplaner: Reiter</title>
    <? require_once 'components/head.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <?
            render_header("Reiter");
        ?>
        <!-- Page Content -->
        <div class="row g-3">

            <!-- Sidebar Menu -->
            <?
                render_sidebar("reiter.php");
            ?>

            <!-- Hauptcontainer -->
            <div class="col-lg-9 col-xxl-10 mb-5 ">
                <div class="col-xxl-10">
                    <!-- Tabelle für Auflistung der Personen -->
                    <div class="table-responsive">
                        <table class="table  table-borderless ">
                            <thead>
                                <tr class="">
                                    <th scope="col">Name</th>
                                    <th scope="col">Beschreibung</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?

                                $reiterListe = [
                                    [
                                        "id"=>1,
                                        "name"=>"ToDo",
                                        "beschreibung"=>"Dinge die erledigt werden müssen."
                                    ],
                                    [
                                        "id"=>2,
                                        "name"=>"Erledigt",
                                        "beschreibung"=>"Dinge die erledigt sind."
                                    ],
                                    [
                                        "id"=>3,
                                        "name"=>"Verschoben",
                                        "beschreibung"=>"Die die später erledigt werden."
                                    ],
                                ];

                                foreach($reiterListe as $reiter){
                                    ?>
                                    <tr>
                                        <td><?= isset($reiter["name"]) ? $reiter["name"] : "-" ?></td>
                                        <td><?= isset($reiter["beschreibung"]) ? $reiter["beschreibung"] : "-" ?></td>
                                        <td class="text-end" ><button class="btn btn-link"><i class="far fa-edit"></i></button><button class="btn btn-link"><i class="far fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?
                                }

                            ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- Bearbeitung/Erstellungs Form -->
                    <div class="mt-5">
                        <form>
                            <h3>Bearbeiten/Erstellen:</h3>
                            <div class="form-group">
                                <label for="reiterInput">Bezeichnung des Reiters:</label>
                                <input type="text" class="form-control" id="reiterInput" placeholder="Reiter">
                            </div>
                            <div class="form-group">
                                <label for="descriptionTextarea">Beschreibung:</label>
                                <textarea class="form-control" id="descriptionTextarea" rows="3" placeholder="Beschreibung"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                            <button type="submit" class="btn btn-info mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>