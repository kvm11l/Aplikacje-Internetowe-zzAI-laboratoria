<?php require_once dirname(__FILE__) .'/../config.php';?>
<h3>Kalkulator</h3>
<p>Wykonaj podstawowe obliczenia matematyczne.</p>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_URL);?>/#two" method="post">
    <div class="pure-control-group">
        <label for="id_num1">Pierwsza liczba:</label>
        <input id="id_num1" type="number" name="num1" step="any"           
               value="<?php if(isset($num1)) print($num1); ?>" />
    </div>
    
    <div class="pure-control-group">
        <label for="id_operation">Działanie:</label>
        <select id="id_operation" name="operation">
            <option value="">-- wybierz --</option>
            <option value="add" <?php if(isset($operation) && $operation == 'add') echo 'selected'; ?>>Dodawanie</option>
            <option value="subtract" <?php if(isset($operation) && $operation == 'subtract') echo 'selected'; ?>>Odejmowanie</option>
            <option value="multiply" <?php if(isset($operation) && $operation == 'multiply') echo 'selected'; ?>>Mnożenie</option>
            <option value="divide" <?php if(isset($operation) && $operation == 'divide') echo 'selected'; ?>>Dzielenie</option>
        </select>
    </div>
    
    <div class="pure-control-group">
        <label for="id_num2">Druga liczba:</label>
        <input id="id_num2" type="number" name="num2" step="any" 
               value="<?php if(isset($num2)) print($num2); ?>" />
    </div>
    
    <div class="pure-controls">
        <br>
        <button type="submit" class="button primary">Oblicz</button>
    </div>
</form>

<?php
// wyświetlenie listy błędów, jeśli istnieją i nie jest pusta
if (isset($messages_basic) && is_array($messages_basic) && count($messages_basic) > 0) {
    echo '<div class="error"><strong>Wystąpiły błędy:</strong><ul>';
    foreach ($messages_basic as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ul></div>';
}
?>

<?php if (isset($result_basic) && empty($messages_basic)): ?>
<div class="result">
    <h3>Wynik:</h3>
    <p><strong>Obliczenie:</strong> <?php echo $calculation; ?></p>
</div>
<?php endif; ?>