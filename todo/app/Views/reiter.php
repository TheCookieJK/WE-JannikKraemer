<div class="container-fluid">
        <!-- Header -->
        <?=
           $header
        ?>
        <!-- Page Content -->
        <div class="row g-3">

            <!-- Sidebar Menu -->
            <?=
                $sidebar
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
