<div class="container-fluid">
        <!-- Header -->
        <?= $header ?>
        <!-- Page Content -->
        <div class="row g-3">

            <?=
                $sidebar
            ?>

            <!-- Hauptcontainer -->
            <div class="col-lg-9 col-xxl-10 container-fluid ">
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
                                        <div class="card-header"><?= isset($todo["name"]) ? $todo["name"] : "Aufgaben" ?>:</div>
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