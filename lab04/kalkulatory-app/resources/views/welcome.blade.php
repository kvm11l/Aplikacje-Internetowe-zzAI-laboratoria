<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja Kalkulatory</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .container { max-width: 800px; margin: 0 auto; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; 
               text-decoration: none; border-radius: 5px; margin: 10px 5px; }
        .btn:hover { background: #0056b3; }
        .nav { margin-bottom: 30px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('calculators.index') }}">Kalkulatory</a>
            <a href="{{ route('about') }}">O nas</a>
        </div>

        <h1>Witamy w aplikacji Kalkulatory</h1>
        
        <h3>Dostępne kalkulatory:</h3>
        <ul>
            <li><strong>Kalkulator Kredytowy</strong> - oblicz ratę kredytu, całkowity koszt i odsetki</li>
            <li><strong>Kalkulator Podstawowy</strong> - wykonuj podstawowe operacje matematyczne</li>
        </ul>
        
        <a href="{{ route('calculators.index') }}" class="btn">
            Przejdź do kalkulatorów
        </a>
        <a href="{{ route('about') }}" class="btn" style="background: #6c757d;">
            Dowiedz się więcej
        </a>
    </div>
</body>
</html>