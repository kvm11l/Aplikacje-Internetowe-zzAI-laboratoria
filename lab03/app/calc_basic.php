<?php
// KONTROLER podstawowego kalkulatora
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$num1 = isset($_REQUEST['num1']) ? $_REQUEST['num1'] : '';
$num2 = isset($_REQUEST['num2']) ? $_REQUEST['num2'] : '';
$operation = isset($_REQUEST['operation']) ? $_REQUEST['operation'] : '';

// 2. walidacja parametrów
$messages_basic = [];

// Sprawdź czy formularz kalkulatora podstawowego został wysłany, zapobiega uruchamianiu kalkulatora podstawowego gdy wysłano formularz kalkulatora kredytowego
$form_submitted_basic = isset($_POST['num1']) || isset($_POST['num2']) || isset($_POST['operation']);

if ($form_submitted_basic) {
    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($num1 == "") {
        $messages_basic[] = 'Nie podano pierwszej liczby';
    }
    if ($num2 == "") {
        $messages_basic[] = 'Nie podano drugiej liczby';
    }
    if ($operation == "") {
        $messages_basic[] = 'Nie wybrano działania';
    }

    // sprawdzenie, czy wartości są liczbami (tylko jeśli nie są puste)
    if ($num1 != "" && !is_numeric($num1)) {
        $messages_basic[] = 'Pierwsza liczba musi być wartością liczbową';
    }
    
    if ($num2 != "" && !is_numeric($num2)) {
        $messages_basic[] = 'Druga liczba musi być wartością liczbową';
    }

    // 3. wykonaj zadanie jeśli wszystko w porządku
    if (empty($messages_basic)) {
        
        //konwersja parametrów na liczby
        $num1 = floatval($num1);
        $num2 = floatval($num2);
        
        // Obliczenia w zależności od wybranej operacji
        switch ($operation) {
            case 'add':
                $result_basic = $num1 + $num2;
                $operation_symbol = '+';
                break;
            case 'subtract':
                $result_basic = $num1 - $num2;
                $operation_symbol = '-';
                break;
            case 'multiply':
                $result_basic = $num1 * $num2;
                $operation_symbol = '×';
                break;
            case 'divide':
                if ($num2 == 0) {
                    $messages_basic[] = 'Nie można dzielić przez zero';
                } else {
                    $result_basic = $num1 / $num2;
                    $operation_symbol = '÷';
                }
                break;
            default:
                $messages_basic[] = 'Nieprawidłowa operacja';
                break;
        }
        
        if (empty($messages_basic)) {
            // Zaokrąglenie do 2 miejsc po przecinku
            $result_basic = round($result_basic, 2);
            $calculation = $num1 . ' ' . $operation_symbol . ' ' . $num2 . ' = ' . $result_basic;
        }
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_basic_view.php';
?>