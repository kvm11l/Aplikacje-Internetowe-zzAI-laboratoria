<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
<style>
    .container { max-width: 500px; margin: 20px auto; padding: 20px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; margin-bottom: 5px; font-weight: bold; }
    input, select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
    button { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
    .error { background: #f88; padding: 10px; border-radius: 4px; margin: 10px 0; }
    .result { background: #ff0; padding: 10px; border-radius: 4px; margin: 10px 0; }
</style>
</head>
<body>
<div class="container">
    <h1>Kalkulator kredytowy</h1>
    
    <form action="<?php print(_APP_URL);?>/app/calc.php" method="post">        <!--  dane formularza wysyłane metodą POST do calc.php -->
        <div class="form-group">
            <label for="id_amount">Kwota kredytu (zł):</label>
            <input id="id_amount" type="number" name="amount" min="1" step="0.01"           
                   value="<?php if(isset($amount)) print($amount); ?>" required />          <!-- pole liczbowe, nazwa amount, print($amount) zeby została ta wartość, obowiązkowe -->
        </div>
        
        <div class="form-group">
            <label for="id_years">Na ile lat:</label>
            <select id="id_years" name="years" required>
                <option value="">-- wybierz --</option>             <!-- na poczatku pusta warotść -->
                <?php for($i = 1; $i <= 30; $i++): ?>               <!-- pętla 1-30 -->
                    <option value="<?php echo $i; ?>"                              
                        <?php if(isset($years) && $years == $i) echo 'selected'; ?>>    <!-- wartość 1-30, jesli years=i dodaje atrybut selected -->
                        <?php if($i == 1) echo $i.' rok' ; if($i >= 2 && $i <= 4) echo $i.' lata'; if($i >= 5 ) echo $i.' lat'; ?>      <!-- warunki poprawnej odmiany -->
                    </option>  
                <?php endfor; ?>
            </select>       <!-- zamkniecie listy rozwijanej -->
        </div>
        
        <div class="form-group">
            <label for="id_interest">Oprocentowanie w skali roku (%):</label>
            <input id="id_interest" type="number" name="interest" min="0" max="100" step="0.01" 
                   value="<?php if(isset($interest)) print($interest); ?>" required />
        </div>
        
        <button type="submit">Oblicz ratę miesięczną</button>
    </form>    

    <?php
    //wyświetlenie listy błędów, jeśli istnieją
    if (isset($messages) && count($messages) > 0) {
        echo '<div class="error"><ol>';
        foreach ($messages as $msg) {           // przejscie przez kazdy element tablicy messages
            echo '<li>'.$msg.'</li>';
        }
        echo '</ol></div>';                 
    }
    ?>

    <?php if (isset($result)): ?>       <!-- czy zmienna istnieje, czy obliczenia zostały przeprowadzone -->
    <div class="result">
        <h3>Wynik:</h3>
        <p><strong>Miesięczna rata:</strong> <?php echo number_format($result, 2, ',', ' '); ?> zł</p>          <!-- liczba result, 2 miejsca po przecinku, separtor dziestny(,) , separator tysiecy ( ) -->
        <p><strong>Łączna kwota do spłaty:</strong> <?php echo number_format($result * $months, 2, ',', ' '); ?> zł</p>
        <p><strong>Całkowity koszt odsetek:</strong> <?php echo number_format(($result * $months) - $amount, 2, ',', ' '); ?> zł</p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>