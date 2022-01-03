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
                <form class="col-xxl-10">

                    <!-- Projektauswahl -->
                    <div>
                        <div class="form-group">
                            <label for="projectSelector" class="h3">Projekt auswählen:</label>
                            <select class="form-control" id="projectSelector">
                                <option selected disabled hidden >- bitte auswählen -</option>
                                <option  value="1">Projekt Placeholder 1</option>
                                <option  value="2">Projekt Placeholder 2</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Auswählen</button>
                        <button type="submit" class="btn btn-primary mt-2">Bearbeiten</button>
                        <button type="submit" class="btn btn-danger mt-2">Löschen</button>
                    </div>

                    <!-- Bearbeitung/Erstellung -->
                    <div class="mt-4">
                        <h3>Projekt bearbeiten/erstellen:</h3>
                        <div class="form-group">
                          <label for="projectInput">Projektname:</label>
                          <input type="text" class="form-control" id="projectInput" placeholder="Projekt">
                        </div>
                        <div class="form-group">
                          <label for="descriptionTextarea">Projektbeschreibung:</label>
                          <textarea class="form-control" id="descriptionTextarea" rows="3" placeholder="Beschreibung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                        <button type="submit" class="btn btn-info mt-2">Reset</button>
                    </div>
              </form>
            </div>
        </div>
    </div>
