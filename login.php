<?
    require_once 'components/header.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Aufgabenplaner: Login</title>
    <? require_once 'components/head.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <?
            render_header("Login");
        ?>

        <!-- Page Content -->
        <div class="container">

            <!-- Login Form -->
            <form class="col">
                <div class="form-group">
                    <label for="emailInput">Email-Adresse:</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Email-Adresse eingeben" name="email">
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
                    Da der Login Vorgang technisch noch nicht realisiert wurde: <a href="todo.php">Überspringen</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>