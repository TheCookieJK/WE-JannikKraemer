<div class="container-fluid">
    <!-- Header -->
    <?= $header

    ?>
    <!-- Page Content -->
    <div class="row g-3">

        <!-- Sidebar Menu -->
        <?= $sidebar

        ?>

            <!-- Hauptcontainer -->
            <div class="col-lg-9 col-xxl-10 mb-5 ">
                <div class="col-xxl-10 ">
                    <!-- Tabelle für Auflistung der Aufgaben -->
                    <div class="table-responsive">
                        <table class="table  table-borderless ">
                            <thead>
                                <tr>
                                    <th scope="col">Aufgabenbezeichnung</th>
                                    <th scope="col">Beschreibung der Aufgabe</th>
                                    <th scope="col">Reiter</th>
                                    <th scope="col">Zuständig</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?
                            $aufgaben = [
                                [
                                    "id"=>1,
                                    "bezeichnung"=>"HTML Datei erstellen",
                                    "beschreibung"=>"HTML Datei erstellen",
                                    "reiter"=>"ToDo",
                                    "person"=>"Max Mustermann"
                                ],
                                [
                                    "id"=>2,
                                    "bezeichnung"=>"CSS Datei erstellen",
                                    "beschreibung"=>"CSS Datei erstellen",
                                    "reiter"=>"ToDo",
                                    "person"=>"Max Mustermann"
                                ],
                                [
                                    "id"=>3,
                                    "bezeichnung"=>"PC eingeschaltet",
                                    "beschreibung"=>"PC einschalten",
                                    "reiter"=>"Erledigt",
                                    "person"=>"Max Mustermann"
                                ],
                                [
                                    "id"=>4,
                                    "bezeichnung"=>"Kaffee trinken",
                                    "beschreibung"=>"Kaffee trinken",
                                    "reiter"=>"Erledigt",
                                    "person"=>"Petra Müller"
                                ],
                                [
                                    "id"=>5,
                                    "bezeichnung"=>"Für die Uni lernen",
                                    "beschreibung"=>"Für die Uni lernen",
                                    "reiter"=>"Verschoben",
                                    "person"=>"Max Mustermann"
                                ],
                            ];

                            foreach($aufgaben as $aufgabe){
                                ?>

                                <tr>
                                    <td><?= isset($aufgabe["bezeichnung"]) ? $aufgabe["bezeichnung"] : "-" ?></td>
                                    <td><?= isset($aufgabe["beschreibung"]) ? $aufgabe["beschreibung"] : "-" ?></td>
                                    <td><?= isset($aufgabe["reiter"]) ? $aufgabe["reiter"] : "-" ?></td>
                                    <td><?= isset($aufgabe["person"]) ? $aufgabe["person"] : "-" ?></td>
                                    <td class="text-end"><button class="btn btn-link"><i class="far fa-edit"></i></button><button class="btn btn-link"><i class="far fa-trash-alt"></i></button></td>
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
                                <label for="taskInput">Aufgabenbezeichnung:</label>
                                <input type="text" class="form-control" id="taskInput" placeholder="Aufgabe" name="taskName">
                            </div>
                            <div class="form-group">
                                <label for="taskDescriptionTextarea">Beschreibung der Aufgabe:</label>
                                <textarea class="form-control" id="taskDescriptionTextarea" rows="3" placeholder="Beschreibung" name="taskDescription"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="creationDate">Beschreibung der Aufgabe:</label>
                                <input type="date" class="form-control" id="creationDate" name="createdAt">
                            </div>

                            <div class="form-group">
                                <label for="dueDate">fällig bis:</label>
                                <input type="date" class="form-control" id="dueDate" name="dueAt">
                            </div>

                            <div class="form-group">
                                <label for="reiterSelector" >Zugehöriger Reiter:</label>
                                <select class="form-control" id="reiterSelector" name="reiter">
                                    <option selected disabled hidden >- bitte auswählen -</option>
                                    <option  value="1">ToDo</option>
                                    <option  value="2">Erledigt</option>
                                    <option  value="3">Verschoben</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="responsibleSelector" >Zuständiger:</label>
                                <select class="form-control" id="responsibleSelector" name="responsiblePerson">
                                    <option selected disabled hidden >- bitte auswählen -</option>
                                    <option  value="1">Max Mustermann</option>
                                    <option  value="2">Petra Müller</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                            <button type="submit" class="btn btn-info mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
