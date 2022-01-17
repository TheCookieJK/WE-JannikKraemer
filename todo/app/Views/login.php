<div class="container-fluid">
        <!-- Header -->
        <?= $header
        ?>


        <!-- Page Content -->
        <div class="container">
            <?php if(session()->getFlashdata('fehler')){?>
                <div class="alert alert-danger">
                    Login fehlgeschlagen
                    <? //d(session()->getFlashdata('fehler') ?>
                </div>
            <?php } ?>
            <!-- Login Form -->
            <?= form_open(base_url().'/login/auth',['method'=>'post'])?>
                <div class="form-group">
                    <label for="emailInput">Email-Adresse:</label>
                    <?= form_input(
                            [
                                "type"=>"email",
                                "class"=>"form-control ". (isset(session()->getFlashdata('fehler')['email']) ? 'is-invalid' : '') ,
                                "id"=>"emailInput",
                                "placeholder"=>"Email-Adresse eingeben",
                                "name"=>"email",
                                "value"=>set_value('email'),
                            ])?>
                    <div class="invalid-feedback">
                        <?= (isset(session()->getFlashdata('fehler')['email']) ? session()->getFlashdata('fehler')['email'] : '') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordInput">Passwort:</label>
                    <?= form_input(["type"=>"password", "class"=>"form-control ". (isset(session()->getFlashdata('fehler')['password']) ? 'is-invalid' : ''),"id"=>"passwordInput","placeholder"=>"Passwort","name"=>"password"])?>
                    <div class="invalid-feedback">
                        <?= (isset(session()->getFlashdata('fehler')['password']) ? session()->getFlashdata('fehler')['password'] : '') ?>
                    </div>
                </div>
                <div class="form-check">
                    <?= form_checkbox(["class"=>"form-check-input " . (isset(session()->getFlashdata('fehler')['agb']) ? 'is-invalid' : ''),"id"=>"agbCheckbox","name"=>"agb","value"=>"accept"])?>
                    <label class="form-check-label" for="agbCheckbox">AGBs und Datenschutzbedingung akzeptieren</label>
                    <div class="invalid-feedback">
                        <?= (isset(session()->getFlashdata('fehler')['agb']) ? session()->getFlashdata('fehler')['agb'] : '') ?>
                    </div>
                </div>
                <?= form_submit(['class'=>'btn btn-primary mt-4','type'=>'submit'],'Einloggen')?>
                <div class="mt-3">
                    Noch nicht registriert? <a href="">Registrierung</a>
                </div>
                <div class="mt-4">
                    Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="todos">Überspringen</a>
                </div>
            </form>
        </div>
    </div>
