<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie książkami</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="addbook.css">
</head>

<body>

    <?php
    require 'src/database.php';

    if (!empty($_POST)) {

        $result = save_pdo($_POST['tytul'], $_POST['imie_nazwisko'], $_POST['kod_isbn'], $_POST['data_wydania'], $_POST['ilosc_egzemplarzy']);
        echo $result;
    }
    ?>

    <?php require 'elements/uppernav.php'; ?>

    <nav id="nav" class="panel">
        <ul id="list">
            <li class="items"><a href="index.php">Strona Główna</a></li>
            <li class="items"><a href="addbook.php">Dodaj Książkę</a></li>
            <li class="items"><a href="editbook.php">Edytuj Książkę</a></li>
            <li class="items"><a href="deletebook.php">Usuń Książkę</a></li>
        </ul>
    </nav>

    <main id="container" class="panel">

        <form id="form" method="post">
            <ul id="errors"></ul>

            <input type="text" name="tytul" id="tytul" class="input" placeholder="Tytuł książki">
            <input type="text" name="imie_nazwisko" id="imienazwisko" class="input" placeholder="Imię i nazwisko autora">
            <input type="text" name="kod_isbn" id="kodisbn" class="input" placeholder="Kod ISBN">
            <input type="date" name="data_wydania" id="datawydania" class="input" placeholder="Data wydania książki">
            <input type="number" name="ilosc_egzemplarzy" id="iloscegzemplarzy" class="input" placeholder="Ilość egzemplarzy">
            <input type="submit" value="Dodaj książkę">
        </form>

    </main>

    <?php require 'elements/footer.php'; ?>
    <script src="addbook.js"></script>
</body>

</html>