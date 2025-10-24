<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab01 KP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        .section {
            margin-bottom: 20px;
            padding: 15px;
            border-left: 4px solid #007bff;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php

        // zmienne
        $imie = "Jan";
        $wiek = 20;
        $czyStudent = true;
        $oceny = [4.5, 5.0, 3.5, 4.0];

        echo "<h1>Witaj na stronie!</h1>";
        echo "<div class='section'>";
        echo "<h2>Informacje podstawowe:</h2>";
        echo "Imię: " . $imie . "<br>";
        echo "Wiek: $wiek lat<br>";
        echo "</div>";

        // if
        echo "<div class='section'>";
        echo "<h2>Warunki:</h2>";
        if ($wiek >= 18) {
            echo "$imie jest osobą dorosłą<br>";
        } else {
            echo "$imie jest niepełnoletnia<br>";
        }

        if ($czyStudent) {
            echo "$imie jest studentem<br>";
        } else {
            echo "$imie nie jest studentem<br>";
        }
        echo "</div>";

        // for
        echo "<div class='section'>";
        echo "<h2>FOR (oceny):</h2>";
        $sumaOcen = 0;
        for ($i = 0; $i < count($oceny); $i++) {
            echo "Ocena " . ($i + 1) . ": " . $oceny[$i] . "<br>";
            $sumaOcen += $oceny[$i];
        }

        $srednia = $sumaOcen / count($oceny);
        echo "Średnia ocen: " . number_format($srednia, 2) . "<br>";
        echo "</div>";

        // while
        echo "<div class='section'>";
        echo "<h2>WHILE (odliczanie):</h2>";
        $licznik = 5;
        while ($licznik > 0) {
            echo "Odliczanie: $licznik<br>";
            $licznik--;
        }
        echo "0 - koniec<br>";
        echo "</div>";

        // foreach
        echo "<div class='section'>";
        echo "<h2>FOREACH (oceny):</h2>";
        foreach ($oceny as $index => $ocena) {
            echo "Przedmiot " . ($index + 1) . ": $ocena<br>";
        }
        echo "</div>";

        // funkcja
        echo "<div class='section'>";
        echo "<h2>Funkcja:</h2>";
        function sprawdzPelnoletnosc($wiek) {
            return $wiek >= 18 ? "pełnoletni" : "niepełnoletni";
        }

        $status = sprawdzPelnoletnosc($wiek);
        echo "$imie jest $status<br>";
        echo "</div>";

        // inne
        echo "<div class='section'>";
        echo "<h2>Dzień tygodnia:</h2>";
        $dzienTygodnia = date('N'); // 1-7 (poniedziałek-niedziela)
        
        if ($dzienTygodnia >= 1 && $dzienTygodnia <= 5) {
            echo "Dziś jest dzień roboczy<br>";
        } elseif ($dzienTygodnia == 6) {
            echo "Dziś jest sobota!<br>";
        } else {
            echo "Dziś jest niedziela!<br>";
        }
        
        echo "Aktualna data: " . date('Y-m-d H:i:s') . "<br>";
        echo "</div>";

        ?>
    </div>
</body>
</html>