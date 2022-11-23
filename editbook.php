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


        </form>

    </main>

    <?php require 'elements/footer.php'; ?>
</body>

</html>