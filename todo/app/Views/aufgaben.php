<? delete_overlay('aufgaben', 'Aufgabe') ?>
<div class="container">
    <!-- Header -->
    <?= $header ?>
    <?= $navbar ?>
    <!-- Page Content -->
    <div class="row g-3">
        <!-- Hauptcontainer -->
        <div class="container mb-5">
            <div class="">
                <? display_submit('aufgaben-selector') ?>
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
                        if ($aufgaben == []) {
                            ?>
                            <tr>
                                <td colspan="5" class="text-center text-secondary">Keine Aufgaben</td>
                            </tr>
                            <?
                        } else {
                            foreach ($aufgaben as $aufgabe) {
                                ?>

                                <tr>
                                    <td><?= isset($aufgabe['name']) ? $aufgabe['name'] : '-' ?></td>
                                    <td><?= isset($aufgabe['beschreibung']) ? $aufgabe['beschreibung'] : '-' ?></td>
                                    <td><?= isset($aufgabe['reiter']) ? $aufgabe['reiter'] : '-' ?></td>
                                    <td><?= isset($aufgabe['person']) ? $aufgabe['person'] : '-' ?></td>
                                    <td class="text-end"><a class="btn btn-link"
                                                            href="<?= base_url() ?>/aufgaben/edit/<?= $aufgabe['id'] ?>"><i
                                                    class="far fa-edit"></i></a>
                                        <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $aufgabe['id'] ?>"><i
                                                    class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>

                                <?
                            }
                        }
                        ?>

                        </tbody>

                    </table>
                </div>
                <!-- Bearbeitung/Erstellungs Form -->
                <?php
                date_default_timezone_set('Europe/Luxembourg');
                ?>
                <div class="mt-5">
                    <? display_submit('aufgaben') ?>
                    <?= form_open(base_url() . '/aufgaben/store', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
                    <h3><?= isset($ausgewaehlt['id']) ? 'Bearbeiten' : 'Erstellen' ?>:</h3>
                    <?= isset($ausgewaehlt['id']) ? form_hidden('id', $ausgewaehlt['id']) : '' ?>
                    <div class="form-group">
                        <label for="taskInput">Aufgabenbezeichnung:</label>
                        <input type="text"
                               class="form-control <?= input_error('aufgaben', 'name') ? 'is-invalid' : '' ?>"
                               id="taskInput" placeholder="Aufgabe" name="name" required
                               value="<?= $ausgewaehlt['name'] ?? '' ?>"
                        >
                        <div class="invalid-feedback">
                            <?= input_error('aufgaben', 'name') ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="taskDescriptionTextarea">Beschreibung der Aufgabe:</label>
                        <textarea
                                class="form-control <?= input_error('aufgaben', 'beschreibung') ? 'is-invalid' : '' ?>"
                                id="taskDescriptionTextarea" rows="3" placeholder="Beschreibung" required
                                name="beschreibung"><?= $ausgewaehlt['beschreibung'] ?? '' ?></textarea>
                        <div class="invalid-feedback">
                            <?= input_error('aufgaben', 'beschreibung') ?? '' ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="dueDate">fällig bis:</label>
                        <input type="datetime-local"
                               class="form-control <?= input_error('aufgaben', 'dueDate') ? 'is-invalid' : '' ?>"
                               id="dueDate" name="dueAt"
                               value="<?= $ausgewaehlt['faelligkeitsdatum'] ?? date('Y-m-d H:i:s') ?>"
                               required>
                        <div class="invalid-feedback">
                            <?= input_error('aufgaben', 'dueDate') ?? '' ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reiterSelector">Zugehöriger Reiter:</label>
                        <select class="form-control <?= input_error('aufgaben', 'reiter') ? 'is-invalid' : '' ?>"
                                id="reiterSelector" name="reiter" required>
                            <option selected disabled hidden>- bitte auswählen -</option>
                            <? foreach ($reiter as $reiterElement) {
                                ?>
                                <option value="<?= $reiterElement['id'] ?>" <?= isset($ausgewaehlt['reiterid']) && $ausgewaehlt['reiterid'] == $reiterElement['id'] ? 'selected' : '' ?>>
                                    <?= $reiterElement['name'] ?>
                                </option>
                                <?
                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= input_error('aufgaben', 'reiter') ?? '' ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="responsibleSelector">Zuständiger:</label>
                        <select class="form-control <?= input_error('aufgaben', 'responsiblePerson') ? 'is-invalid' : '' ?>"
                                id="responsibleSelector" multiple="multiple"
                                name="responsiblePerson[]">

                            <?
                            $zugeordnet = [];
                            if (isset($ausgewaehlt['person'])) {
                                $zugeordnet = explode(', ', $ausgewaehlt['person']);
                            }

                            ?>
                            <? foreach ($mitglieder as $mitglied) { ?>
                                <option value="<?= $mitglied['id'] ?>" <?= in_array($mitglied['username'], $zugeordnet) ? 'selected' : '' ?>><?= $mitglied['username'] ?></option>
                            <? } ?>

                        </select>
                        <div class="invalid-feedback">
                            <?= input_error('aufgaben', 'responsiblePerson') ?? '' ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Speichern</button>
                    <a href="<?= base_url() ?>/aufgaben" class="btn btn-info mt-2">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
