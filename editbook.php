<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie książkami</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require 'src/ksiazkidb.php' ?>
    <?php require 'elements/uppernav.php'; ?>

    <nav id="nav" class="panel">
        <ul id="list">
            <li class="items"><a href="index.php">Strona Główna</a></li>
            <li class="items"><a href="addbook.php">Dodaj Książkę</a></li>
            <li class="items"><a href="editbook.php">Edytuj Książkę</a></li>
            <li class="items"><a href="deletebook.php">Usuń Książkę</a></li>
        </ul>
    </nav>

    <main class="panel">
        <?php
        include_once 'src/ksiazkidb.php';
        $x = getksiazki();
        foreach (($x) as $y) :
        ?>

            <tr>
                <td><span color="white">Tytuł: <?= $y->tytul ?></span></td>
                <td><span color="white">Imie i nazwisko autora: <?= $y->imie ?></span></td>
                <td><span color="white">Kod ISBN: <?= $y->isbn ?></span> </td>
                <td><span color="white">Data wydania: <?= $y->dataw ?></span></td>
                <td><span color="white">Ilość wydanych egzemplarzy: <?= $y->ilosc ?></span></td>
            </tr></br>
        <?php endforeach; ?>
    </main>

    <?php require 'elements/footer.php'; ?>

</body>

</html>