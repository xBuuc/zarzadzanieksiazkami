<?php
class ksiazka
{
    public string $tytul;
    public string $imie;
    public string $isbn;
    public string $dataw;
    public string $ilosc;
}

function getksiazki(): array
{

    $dir = 'sqlite:src/ksiazki.sqlite3';

    try {
        $db = new PDO($dir) or die("cannot open the database");;
    } catch (Exception $e) {
        echo $e->getMessage();
        return [];
    }


    // Create SQL query
    $sql = <<<SQL
        SELECT 
            tytul as tytul, 
            imie_nazwisko as imie, 
            kod_isbn as isbn, 
            data_wydania as dataw,
            ilosc_egzemplarzy as ilosc
        FROM ksiazki LIMIT 10;
        
    SQL;


    $stmt = $db->prepare($sql);


    $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_CLASS, ksiazka::class);

    return $result ? $result : [];
}
