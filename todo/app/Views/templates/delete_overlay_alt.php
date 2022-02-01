<div class="overlay" id="dialog">

    <div class="card w-25" style="min-width: 20rem">
        <div class="card-header"><?= $name ?> wirklich löschen?</div>
        <div class="card-body">
            <p>Sind Sie sich, dass Sie dieses <?= $name ?> unwiederruflich löschen wollen?</p>
            <div style="display: flex; justify-content: end"><button onclick="deleteCurrent()" class="btn btn-danger me-2" id="acceptBtn">Ja</button><button onclick="closeDialog()" class="btn btn-secondary">Nein</button></div>

        </div>
    </div>

</div>
<script>
    function closeDialog(){
        document.getElementById('dialog').classList.remove('show');
        window.selected = undefined;
    }

    function openDialog(id){
        window.selected = id;
        document.getElementById('dialog').classList.add('show');
    }

    function deleteCurrent(){
        if(window.selected !== undefined){
            window.location.href='<?= base_url() ?>/<?= $page ?>/delete/' + window.selected;
        }
    }
</script>