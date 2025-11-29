<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O nas - Kalkulatory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        .nav { margin-bottom: 30px; }
        .nav a { margin-right: 15px; text-decoration: none; color: #007bff; }
        .nav a:hover { text-decoration: underline; }
        .content { line-height: 1.6; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('calculators.index') }}">Kalkulatory</a>
            <a href="{{ url('/') }}">Strona główna</a>
            <strong>O nas</strong>
        </div>

        <h1>O nas</h1>
        
        <div class="content">
            <p>Witamy w naszej aplikacji kalkulatorów! Jesteśmy zespołem pasjonatów matematyki i programowania, którzy postanowili stworzyć przydatne narzędzia do codziennych obliczeń.</p>
            
            <h2>Nasza misja</h2>
            <p>Dostarczamy proste, ale potężne narzędzia matematyczne, które pomagają w podejmowaniu świadomych decyzji finansowych i rozwiązywaniu problemów matematycznych.</p>
            
            <h2>Dostępne kalkulatory</h2>
            <ul>
                <li><strong>Kalkulator kredytowy</strong> - pomaga w planowaniu spłaty kredytów</li>
                <li><strong>Kalkulator podstawowy</strong> - wykonuje podstawowe operacje matematyczne</li>
            </ul>
            
            <h2>Kontakt</h2>
            <p>Masz pytania lub sugestie? Skontaktuj się z nami!</p>
            <p>Email: kontakt@kalkulatory.pl<br>Telefon: +48 123 456 789</p>
        </div>
    </div>
</body>
</html>