<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/30eca4fb9f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>

</head>
<body >
<div class="container">
<div id="toolbar">

</div>
<table  data-toggle="table"
        data-show-columns="true"
        showColumnsToggleAll="true"
        data-show-toggle="true"
        data-search="true"
        data-sort-stable="true"
        data-toolbar="#toolbar"
        data-pagination="true"
>
    <thead>
        <tr>
            <th data-sortable="true">ID</th>
            <th data-sortable="true">Vorname</th>
            <th data-sortable="true">Name</th>
            <th>Straße</th>
            <th>PLZ</th>
            <th>Ort</th>
        </tr>
    </thead>
    <tbody>
    <?
        foreach($personen as $person){
            ?>
                <tr>
                    <td><?= $person['id']; ?></td>
                    <td><?= $person['vorname']; ?></td>
                    <td><?= $person['name']; ?></td>
                    <td><?= $person['strasse']; ?></td>
                    <td><?= $person['plz']; ?></td>
                    <td><?= $person['ort']; ?></td>
                </tr>

            <?
        }

    ?>
    </tbody>
</table>

</div>

</body>
</html>