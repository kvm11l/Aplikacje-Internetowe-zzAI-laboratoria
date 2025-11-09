<?php require_once dirname(__FILE__) .'/../config.php';?>
<h3>Kalkulator kredytowy</h3>
<p>Oblicz swoją miesięczną ratę kredytu na podstawie kwoty, okresu spłaty i oprocentowania.</p>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_URL);?>/#three" method="post">
    <div class="pure-control-group">
        <label for="id_amount">Kwota kredytu (zł):</label>
        <input id="id_amount" type="number" name="amount" min="1" step="0.01"           
               value="<?php if(isset($amount)) print($amount); ?>" />
			   <!-- brak słowa required w: print($amount); ?>" required />  aby wyświetlać błędy -->
    </div>
    
    <div class="pure-control-group">
        <label for="id_years">Na ile lat:</label>
        <select id="id_years" name="years" >
            <option value="">-- wybierz --</option>
            <?php for($i = 1; $i <= 30; $i++): ?>
                <option value="<?php echo $i; ?>"                              
                    <?php if(isset($years) && $years == $i) echo 'selected'; ?>>
                    <?php if($i == 1) echo $i.' rok' ; if($i >= 2 && $i <= 4) echo $i.' lata'; if($i >= 5 ) echo $i.' lat'; ?>
                </option>  
            <?php endfor; ?>
        </select>
    </div>
    
    <div class="pure-control-group">
        <label for="id_interest">Oprocentowanie w skali roku (%):</label>
        <input id="id_interest" type="number" name="interest" min="0" max="100" step="0.01" 
               value="<?php if(isset($interest)) print($interest); ?>"  />
    </div>
    
    <div class="pure-controls">
	<br>
        <button type="submit" class="button primary">Oblicz ratę miesięczną</button>
		
    </div>
</form>

<?php
// wyświetlenie listy błędów, jeśli istnieją i nie jest pusta
if (isset($messages) && is_array($messages) && count($messages) > 0) {
    echo '<div class="error"><strong>Wystąpiły błędy:</strong><ul>';
    foreach ($messages as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ul></div>';
}
?>

<?php if (isset($result)): ?>
<div class="result">
    <h3>Wynik:</h3>
    <p><strong>Miesięczna rata:</strong> <?php echo number_format($result, 2, ',', ' '); ?> zł</p>
    <p><strong>Łączna kwota do spłaty:</strong> <?php echo number_format($result * $months, 2, ',', ' '); ?> zł</p>
    <p><strong>Całkowity koszt odsetek:</strong> <?php echo number_format(($result * $months) - $amount, 2, ',', ' '); ?> zł</p>
</div>
<?php endif; ?>