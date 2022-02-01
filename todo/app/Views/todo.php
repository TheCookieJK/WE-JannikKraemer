<div class="container">
    <!-- Header -->
    <?= $header ?>
    <?= $navbar ?>
    <!-- Page Content -->
    <div class="row g-3">
        <!-- Hauptcontainer -->
        <div class="container mb-5">
            <div class="">
                <div class="row g-3 h-100">
                    <?
                        if($todos == []){
                            ?>
                            <div class="col-12 text-center h3 h-100 d-flex flex-column justify-content-center align-items-center text-secondary font-weight-bold">
                                <div class="mb-4">Noch keine Aufgaben eingetragen.</div>
                                <a href="<?= base_url() ?>/aufgaben" class="btn btn-primary">Aufgaben verwalten</a>
                            </div>
                            <?
                        }else{
                            // To Do Array
                            foreach($todos as $todo){

                                ?>
                                <div class="col-12 col-md-6 col-xl">
                                    <div class="card">
                                        <div class="card-header"><?= isset($todo['name']) ? $todo['name'] : 'Aufgaben' ?>:</div>
                                        <ul class="list-group">
                                            <?= $todo['aufgaben'] ?? '' ?>
                                        </ul>
                                    </div>
                                </div>
                                <?
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>