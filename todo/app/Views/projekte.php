<? delete_overlay("projekte", "Projekt") ?>
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

                <!-- Projektauswahl -->
                <div>
                    <? display_submit('projekt-selector') ?>
                    <?= form_open(base_url().'/projekte/selectaction',['method'=>'post']) ?>
                    <div class="form-group">
                        <label for="projectSelector" class="h3">Projekt auswählen:</label>
                        <select class="form-control" id="projectSelector" name="project">
                            <?
                            foreach ($projekte as $projekt) {
                            ?>
                                <option value="<?= $projekt['id']?>" <?= (isset($selectedProjekt['id']) && $selectedProjekt['id'] == $projekt['id']) || $projekt['id'] == session()->projekt ? 'selected="selected"' : ''  ?>><?= $projekt['name'] ?></option>
                            <?}?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" name="select" >Auswählen</button>
                    <button type="submit" class="btn btn-primary mt-2" name="edit">Bearbeiten</button>
                    <button type="button" onclick="openDialog(document.getElementById('projectSelector').value)" class="btn btn-danger mt-2"  name="delete">Löschen</button>
                    </form>
                </div>

                <!-- Bearbeitung/Erstellung -->
                <div class="mt-4">
                    <h3>Projekt <?= isset($selectedProjekt) ? 'bearbeiten' :  'erstellen' ?>:</h3>
                    <? display_submit('projekt') ?>
                    <?= form_open(base_url(). '/projekte/store')?>
                        <?= isset($selectedProjekt) ? form_hidden("id",$selectedProjekt['id']) : '' ?>
                        <div class="form-group">
                            <label for="projectInput">Projektname:</label>
                            <input
                                    type="text"
                                    class="form-control <?=  isset(session()->getFlashdata('projekt-fehler')['name']) ? 'is-invalid' : '' ?>"
                                    id="projectInput"
                                    placeholder="Projekt"
                                    name="name"
                                    value="<?= $selectedProjekt['name'] ?? '' ?>"
                            >
                            <div class="invalid-feedback">
                                <?= (isset(session()->getFlashdata('projekt-fehler')['name']) ? session()->getFlashdata('projekt-fehler')['name'] : '') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descriptionTextarea">Projektbeschreibung:</label>
                            <textarea class="form-control <?=  isset(session()->getFlashdata('projekt-fehler')['beschreibung']) ? 'is-invalid' : '' ?>" id="descriptionTextarea" rows="3"
                                      placeholder="Beschreibung" name="beschreibung"
                            ><?= $selectedProjekt['beschreibung'] ?? '' ?></textarea>
                            <div class="invalid-feedback">
                                <?= (isset(session()->getFlashdata('projekt-fehler')['beschreibung']) ? session()->getFlashdata('projekt-fehler')['beschreibung'] : '') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                        <a href="<?= base_url() ?>/projekte" class="btn btn-info mt-2" onclick="">Reset</a>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
