<?= delete_overlay('mitglieder','Mitglied') ?>
<div class="container-fluid">
        <!-- Header -->
        <?= $header ?>


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
                                    if($mitglied['projekteid'] != null){
                                        $projectState = 0;
                                        if($mitglied['projekteid'] == session()->get('projekt')) {
                                            $projectState = 1;
                                        }
                                    }

                                    ?>
                                    <tr>
                                        <td><?= isset($mitglied['username']) ? $mitglied['username'] : '-' ?></td>
                                        <td><?= isset($mitglied['email']) ? $mitglied['email'] : '-' ?></td>
                                        <td>
                                            <div class="in-project-indicator <?= $projectState == 1 ? 'in-project-active' : '' ?>">
                                                <div class="indicator-ball rounded-circle "></div>
                                                <div><?= $projectState == 1 ? 'Zugeordnet' : ($projectState == 0 ?  'Projekt nicht zugeordnet' : 'Keinem Projekt zugeordnet') ?></div>
                                            </div>
                                        </td>
                                        <td class="text-end"><a class="btn btn-link" href="<?= base_url() ?>/mitglieder/edit/<?= $mitglied['id'] ?>"><i class="far fa-edit"></i></a><button onclick="openDialog(<?= $mitglied['id'] ?>)" class="btn btn-link"><i class="far fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?
                                }

                            ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- Bearbeitung/Erstellungs Form -->
                    <div class="mt-4">
                        <?php if(session()->getFlashdata('mitglieder-success')){?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('mitglieder-success') ?>
                            </div>
                        <?php } ?>
                        <?php if(session()->getFlashdata('mitglieder-fehler')){?>
                            <div class="alert alert-warning">
                                <?= session()->getFlashdata('mitglieder-fehler') ?>
                            </div>
                        <?php } ?>
                        <?= form_open(base_url() . '/mitglieder/store',['method' => 'post']) ?>
                            <h3>
                                <? if(isset($ausgewaehlt) && $ausgewaehlt['id']){ ?>
                                Bearbeiten:
                                <?}else{?>
                                    Erstellen:
                                <?}?>
                            </h3>
                            <input type="hidden" name="id" value="<?= isset($ausgewaehlt) ? $ausgewaehlt['id'] : '' ?>"/>
                            <div class="form-group">
                                <label for="usernameInput" >Username:</label>
                                <input type="text" class="form-control" id="usernameInput" placeholder="Username" name="username" required="required" value="<?= isset($ausgewaehlt) ? $ausgewaehlt['username'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="emailInput">E-Mail-Adresse:</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="E-Mail-Adresse eingeben" name="email" value="<?= isset($ausgewaehlt) ? $ausgewaehlt['email'] : '' ?>">
                            </div>
                            <? if(!isset($ausgewaehlt) || $ausgewaehlt['id'] == session()->get('id')  ){?>
                            <div class="form-group">
                                <label for="passwordInput">Passwort:</label>
                                <input type="password" class="form-control" id="passwordInput" placeholder="Passwort" name="password" >
                            </div>
                            <? }  ?>
                            <div class="form-group">
                                <label for="projectSelector">Projekt zuordnen:</label>
                                <select class="form-control" id="projectSelector" name="assignedProject">
                                    <option selected disabled hidden >- bitte auswählen -</option>
                                    <option value="0" >Keinem Projekt zuordnen</option>
                                    <?foreach($projekte as $projekt) {?>
                                            <option  value="<?= $projekt['id'] ?>"><?= $projekt['id'] ?> - <?= $projekt['name'] ?></option>
                                    <?}?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                            <a href="<?= base_url()?>/mitglieder" class="btn btn-info mt-2">Reset</a>
                        <?= form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>

