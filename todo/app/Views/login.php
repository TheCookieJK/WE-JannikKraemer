<div class="container-fluid">
        <!-- Header -->
        <?= $header
        ?>


        <!-- Page Content -->
        <div class="container">
            <?php if(session()->getFlashdata('fehler')){?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('fehler') ?>
                </div>
            <?php } ?>
            <!-- Login Form -->
            <?= form_open(base_url().'/login/auth',['method'=>'post'])?>
                <div class="form-group">
                    <label for="emailInput">Email-Adresse:</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Email-Adresse eingeben" name="email" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                    <label for="passwordInput">Passwort:</label>
                    <input type="password" class="form-control" id="passwordInput" placeholder="Passwort" name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="agbCheckbox" name="agb">
                    <label class="form-check-label" for="agbCheckbox">AGBs und Datenschutzbedingung akzeptieren</label>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Einloggen</button>
                <div class="mt-3">
                    Noch nicht registriert? <a href="">Registrierung</a>
                </div>
                <div class="mt-4">
                    Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="todos">Überspringen</a>
                </div>
            </form>
        </div>
    </div>
