<!DOCTYPE HTML>
<html>
<head>
    <title>Kalkulatory - Laravel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
    <style>
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .calculator-tabs { margin-bottom: 30px; }
        .calculator-tab { display: none; }
        .calculator-tab.active { display: block; }
        .tab-buttons { display: flex; gap: 10px; margin-bottom: 20px; }
        .tab-button { padding: 10px 20px; border: 1px solid #ddd; background: #f5f5f5; cursor: pointer; }
        .tab-button.active { background: #007bff; color: white; }
        .error { color: red; margin: 10px 0; }
        .result { background: #e8f5e8; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .pure-control-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div style="margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid #ddd;">
            <a href="{{ url('/') }}" style="margin-right: 15px; text-decoration: none; color: #007bff;">Strona główna</a>
            <a href="{{ route('about') }}" style="margin-right: 15px; text-decoration: none; color: #007bff;">O nas</a>
            <strong>Kalkulatory</strong>
        </div>
        
        <h1>Kalkulatory</h1>
        <div class="tab-buttons">
            <button class="tab-button {{ session('active_tab', 'credit') == 'credit' ? 'active' : '' }}" onclick="showTab('credit')">
                Kalkulator Kredytowy
            </button>
            <button class="tab-button {{ session('active_tab') == 'basic' ? 'active' : '' }}" onclick="showTab('basic')">
                Kalkulator Podstawowy
            </button>
        </div>

        <!-- Kalkulator Kredytowy -->
        <div id="credit-tab" class="calculator-tab {{ session('active_tab', 'credit') == 'credit' ? 'active' : '' }}">
            <h2>Kalkulator Kredytowy</h2>
            <p>Oblicz swoją miesięczną ratę kredytu</p>
            
            <form class="pure-form pure-form-stacked" action="{{ route('calculators.credit') }}" method="POST">
                @csrf
                <div class="pure-control-group">
                    <label for="amount">Kwota kredytu (zł):</label>
                    <input id="amount" type="number" name="amount" min="1" step="0.01" 
                           value="{{ old('amount') }}" required />
                    @error('amount')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-control-group">
                    <label for="years">Na ile lat:</label>
                    <select id="years" name="years" required>
                        <option value="">-- wybierz --</option>
                        @for($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}" {{ old('years') == $i ? 'selected' : '' }}>
                                @if($i == 1) {{ $i }} rok
                                @elseif($i >= 2 && $i <= 4) {{ $i }} lata
                                @else {{ $i }} lat
                                @endif
                            </option>
                        @endfor
                    </select>
                    @error('years')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-control-group">
                    <label for="interest">Oprocentowanie w skali roku (%):</label>
                    <input id="interest" type="number" name="interest" min="0" max="100" step="0.01" 
                           value="{{ old('interest') }}" required />
                    @error('interest')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Oblicz ratę miesięczną</button>
                </div>
            </form>

            @if(session('credit_result'))
            <div class="result">
                <h3>Wynik:</h3>
                <p><strong>Miesięczna rata:</strong> {{ number_format(session('credit_result'), 2, ',', ' ') }} zł</p>
                <p><strong>Łączna kwota do spłaty:</strong> {{ number_format(session('credit_total_amount'), 2, ',', ' ') }} zł</p>
                <p><strong>Całkowity koszt odsetek:</strong> {{ number_format(session('credit_total_interest'), 2, ',', ' ') }} zł</p>
            </div>
            @endif
        </div>

        <!-- Kalkulator Podstawowy -->
        <div id="basic-tab" class="calculator-tab {{ session('active_tab') == 'basic' ? 'active' : '' }}">
            <h2>Kalkulator Podstawowy</h2>
            <p>Wykonaj podstawowe obliczenia matematyczne</p>
            
            <form class="pure-form pure-form-stacked" action="{{ route('calculators.basic') }}" method="POST">
                @csrf
                <div class="pure-control-group">
                    <label for="num1">Pierwsza liczba:</label>
                    <input id="num1" type="number" name="num1" step="any" 
                           value="{{ old('num1') }}" required />
                    @error('num1')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-control-group">
                    <label for="operation">Działanie:</label>
                    <select id="operation" name="operation" required>
                        <option value="">-- wybierz --</option>
                        <option value="add" {{ old('operation') == 'add' ? 'selected' : '' }}>Dodawanie</option>
                        <option value="subtract" {{ old('operation') == 'subtract' ? 'selected' : '' }}>Odejmowanie</option>
                        <option value="multiply" {{ old('operation') == 'multiply' ? 'selected' : '' }}>Mnożenie</option>
                        <option value="divide" {{ old('operation') == 'divide' ? 'selected' : '' }}>Dzielenie</option>
                    </select>
                    @error('operation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-control-group">
                    <label for="num2">Druga liczba:</label>
                    <input id="num2" type="number" name="num2" step="any" 
                           value="{{ old('num2') }}" required />
                    @error('num2')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    @error('division')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
                </div>
            </form>

            @if(session('basic_result'))
            <div class="result">
                <h3>Wynik:</h3>
                <p><strong>Obliczenie:</strong> {{ session('basic_calculation') }}</p>
            </div>
            @endif
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Ukryj wszystkie zakładki
            document.querySelectorAll('.calculator-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Pokaż wybraną zakładkę
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Aktualizuj przyciski
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');
        }
    </script>
</body>
</html>