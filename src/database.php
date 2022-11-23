<?php



function save_pdo(string $tytul, string $imie, string $isbn, string $data, int $ilosc): bool
{
    $dir = 'sqlite:src/ksiazki.sqlite3';
    $dt =  date('Y-m-d', strtotime($data));

    try {
        $db = new PDO($dir) or die("cannot open the database");;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
    // Create SQL query
    $sql = <<<SQL
        INSERT INTO ksiazki (tytul, imie_nazwisko, kod_isbn, data_wydania, ilosc_egzemplarzy) 
        VALUES (:tytul, :imie, :isbn, ':data', :ilosc)
    SQL;

    // prepare statement
    $stmt = $db->prepare($sql);

    $result = $stmt->execute([
        ':tytul' => $tytul,
        ':imie' => $imie,
        ':isbn' => $isbn,
        ':data' => $dt,
        ':ilosc' => $ilosc
    ]);

    return $result;
}
