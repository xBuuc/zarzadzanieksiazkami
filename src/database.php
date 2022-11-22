<?php

function save_pdo(string $tytul, string $imie_nazwisko, string $kod_isbn, string $data_wydania, int $ilosc_egzemplarzy): bool
{

    try {
        $db = new PDO('../sqlite:ksiazki.db');
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
