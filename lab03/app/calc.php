<?php
// KONTROLER kalkulatora kredytowego
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : '';
$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : '';

// 2. walidacja parametrów
$messages = [];

// sprawdź czy formularz kalkulatora kredytowego został wysłany, zapobiega uruchamianiu kalkulatora kredytowego gdy wysłano formularz kalkulatora podstawowego
$form_submitted = isset($_POST['amount']) || isset($_POST['years']) || isset($_POST['interest']);

if ($form_submitted) {
    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($amount == "") {
        $messages[] = 'Nie podano kwoty kredytu';
    }
    if ($years == "") {
        $messages[] = 'Nie podano liczby lat';
    }
    if ($interest == "") {
        $messages[] = 'Nie podano oprocentowania';
    }

    // sprawdzenie, czy wartości są liczbami i nieujemne (tylko jeśli nie są puste)
    if ($amount != "" && (!is_numeric($amount) || $amount <= 0)) {
        $messages[] = 'Kwota kredytu musi być liczbą dodatnią';
    }
    
    if ($years != "" && (!is_numeric($years) || $years <= 0)) {
        $messages[] = 'Liczba lat musi być liczbą dodatnią';
    }   
    
    if ($interest != "" && (!is_numeric($interest) || $interest < 0)) {
        $messages[] = 'Oprocentowanie musi być liczbą nieujemną';
    }

    // 3. wykonaj zadanie jeśli wszystko w porządku
    if (empty($messages)) {
        
        //konwersja parametrów na liczby
        $amount = floatval($amount);    // zmiana na float
        $years = intval($years);        // zmiana na int
        $interest = floatval($interest);
        
        // Obliczenie miesięcznej raty
        // Wzór: R = P * (r*(1+r)^n) / ((1+r)^n - 1)
        // gdzie:
        // R - miesięczna rata
        // P - kwota kredytu
        // r - miesięczne oprocentowanie (roczne / 12 / 100)
        // n - liczba miesięcy
        
        $monthly_interest = ($interest / 100) / 12;     // dzieli roczne oprocentowanie na miesięczne
        $months = $years * 12;                          // zamiana lat na miesiace
        
        if ($monthly_interest == 0) {
            // Kredyt bez oprocentowania
            $result = $amount / $months;
        } else {
            $numerator = $monthly_interest * pow(1 + $monthly_interest, $months);   // licznik
            $denominator = pow(1 + $monthly_interest, $months) - 1;         // mianownik
            $result = $amount * ($numerator / $denominator);        // ostateczna rata
        }
        
        // Zaokrąglenie do 2 miejsc po przecinku
        $result = round($result, 2);
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
?>