<?php



function save_pdo(string $tytul, string $imie, string $isbn, string $data, int $ilosc): bool
{
    $dir = 'sqlite:src/ksiazki.sqlite3';
    // $dt =  date('Y-m-d', strtotime($data));

    try {
        $db = new PDO($dir) or die("cannot open the database");;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    // Create SQL query
    $sql = <<<SQL
        INSERT INTO ksiazki (tytul, imie_nazwisko, kod_isbn, data_wydania, ilosc_egzemplarzy) 
        VALUES (?, ?, ?, ?, ?)
    SQL;

    // prepare statement
    $stmt = $db->prepare($sql);

    $stmt->bindParam(1, $tytul, PDO::PARAM_STR);
    $stmt->bindParam(2, $imie, PDO::PARAM_STR);
    $stmt->bindParam(3, $isbn, PDO::PARAM_STR);
    $stmt->bindParam(4, $data, PDO::PARAM_STR);
    $stmt->bindParam(5, $ilosc, PDO::PARAM_INT);

    $result = $stmt->execute();

    return $result;
}
