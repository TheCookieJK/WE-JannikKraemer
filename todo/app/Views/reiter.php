<?= $deleteOverlay ?>
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
                            if($reiterListe == []){
                                ?>
                                <tr><td colspan="5" class="text-center text-secondary">Keine Reiter</td></tr>
                                <?
                            }else{
                                foreach($reiterListe as $reiter){
                                    ?>
                                    <tr>
                                        <td><?= isset($reiter["name"]) ? $reiter["name"] : "-" ?></td>
                                        <td><?= isset($reiter["beschreibung"]) ? $reiter["beschreibung"] : "-" ?></td>
                                        <td class="text-end" ><a href="<?= base_url()?>/reiter/edit/<?= $reiter['id'] ?>" class="btn btn-link"><i class="far fa-edit"></i></a><button class="btn btn-link" onclick="openDialog(<?= $reiter['id'] ?>)"><i class="far fa-trash-alt"></i></button></td>
                                    </tr>
                                    <?
                                }
                            }
                            ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- Bearbeitung/Erstellungs Form -->
                    <div class="mt-5">
                        <? display_submit("reiter") ?>
                        <?= form_open(base_url() . '/reiter/store',['method'=>'post']) ?>
                            <h3><?= isset($ausgewaehlt) ? 'Bearbeiten' : 'Erstellen'?>:</h3>
                            <?= isset($ausgewaehlt['id']) ? form_hidden('id',$ausgewaehlt['id']) : '' ?>
                            <div class="form-group">
                                <label for="reiterInput">Bezeichnung des Reiters:</label>
                                <input type="text" class="form-control" id="reiterInput" placeholder="Reiter"
                                       name="name"
                                       value="<?= $ausgewaehlt['name'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="descriptionTextarea">Beschreibung:</label>
                                <textarea class="form-control" id="descriptionTextarea" rows="3" placeholder="Beschreibung"
                                name="beschreibung"><?= $ausgewaehlt['beschreibung'] ?? '' ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                            <a href="<?= base_url() ?>/reiter" class="btn btn-info mt-2">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
