<?php

if (!function_exists('delete_overlay')) {
    function delete_overlay($page, $name)
    {
        ?>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $name ?> löschen? </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sind Sie sich, dass Sie dieses <?= $name ?> unwiederruflich löschen wollen?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="button" id="deleteBtn" class="btn btn-danger">Löschen</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var deleteModel = document.getElementById("deleteModal");
            var deleteBtn = document.getElementById("deleteBtn");

            deleteModel.addEventListener('show.bs.modal', function (e) {
                if (e.relatedTarget.dataset.id !== undefined) {
                    window.toDelete = e.relatedTarget.dataset.id;
                }
            });

            deleteModel.addEventListener('hide.bs.modal', function () {
                window.toDelete = undefined;
            });
            deleteBtn.addEventListener('click', function () {
                if (window.toDelete !== undefined) {
                    window.location.href = '<?= base_url() ?>/<?= $page ?>/delete/' + window.toDelete;
                }
            })
        </script>
        <?php
    }
}


if (!function_exists('delete_overlay_1')) {
    function delete_overlay_1($page, $name)
    {
        ?>

        <div class="overlay" id="dialog">

            <div class="card w-25" style="min-width: 20rem">
                <div class="card-header"><?= $name ?> wirklich löschen?</div>
                <div class="card-body">
                    <p>Sind Sie sich, dass Sie dieses <?= $name ?> unwiederruflich löschen wollen?</p>
                    <div style="display: flex; justify-content: end">
                        <button onclick="deleteCurrent()" class="btn btn-danger me-2" id="acceptBtn">Ja</button>
                        <button onclick="closeDialog()" class="btn btn-secondary">Nein</button>
                    </div>

                </div>
            </div>

        </div>
        <script>
            function closeDialog() {
                document.getElementById('dialog').classList.remove('show');
                window.selected = undefined;
            }

            function openDialog(id) {
                window.selected = id;
                document.getElementById('dialog').classList.add('show');
            }

            function deleteCurrent() {
                if (window.selected !== undefined) {
                    window.location.href = '<?= base_url() ?>/<?= $page ?>/delete/' + window.selected;
                }
            }
        </script>
        <?
    }
}