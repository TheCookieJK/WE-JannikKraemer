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
                <div class="col-xxl-10">
                    <!-- Tabelle für Auflistung der Personen -->
                    <div class="table-responsive">
                        <table class="table  table-borderless ">
                            <thead>
                                <tr class="">
                                    <th scope="col">Name</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">In Projekt</th>

                                    <th ><!-- Placeholder für Aktionen --></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php


                                $projektID = 1;

                                foreach($mitglieder as $mitglied){

                                    /**
                                     * ProjectStates:
                                     * -1 = Keinem Projekt zugeordnet
                                     * 0 = Projekt nicht zugeordnet
                                     * 1 = Zugeordnet
                                     */
                                    $projectState = -1;
                                    if(isset($mitglied["projektID"])){
                                        $projectState = $mitglied["projektID"] == $projektID;
                                    }

                                    ?>
                                    <tr>
                                        <td><?= isset($mitglied["name"]) ? $mitglied["name"] : '-' ?></td>
                                        <td><?= isset($mitglied["email"]) ? $mitglied["email"] : '-' ?></td>
                                        <td>
                                            <div class="in-project-indicator <?= $projectState == 1 ? 'in-project-active' : '' ?>">
                                                <div class="indicator-ball rounded-circle "></div>
                                                <div><?= $projectState == 1 ? 'Zugeordnet' : ($projectState == 0 ?  'Projekt nicht zugeordnet' : 'Keinem Projekt zugeordnet') ?></div>
                                            </div>
                                        </td>
                                        <td class="text-end"><button class="btn btn-link"><i class="far fa-edit"></i></button><button class="btn btn-link"><i class="far fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?
                                }

                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- Bearbeitung/Erstellungs Form -->
                    <div class="mt-4">
                        <form>
                            <h3>Bearbeiten/Erstellen:</h3>
                            <div class="form-group">
                                <label for="usernameInput">Username:</label>
                                <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="emailInput">E-Mail-Adresse:</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="E-Mail-Adresse eingeben" name="email">
                            </div>
                            <div class="form-group">
                                <label for="passwordInput">Username:</label>
                                <input type="password" class="form-control" id="passwordInput" placeholder="Passwort" name="password">
                            </div>

                            <div class="form-group">
                                <label for="projectSelector">Projekt zuordnen:</label>
                                <select class="form-control" id="projectSelector" name="assignedProject">
                                    <option selected disabled hidden >- bitte auswählen -</option>
                                    <option  value="0">Keinem Projekt zuordnen</option>
                                    <option  value="1">Projekt 1</option>
                                    <option  value="2">Projekt 2</option>
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