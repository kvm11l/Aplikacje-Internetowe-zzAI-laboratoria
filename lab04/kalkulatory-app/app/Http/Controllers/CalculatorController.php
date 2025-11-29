<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculators.index');
    }

    public function calculateCredit(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'years' => 'required|integer|min:1|max:30',
            'interest' => 'required|numeric|min:0|max:100'
        ]);

        // Obliczenia kalkulatora kredytowego
        $amount = floatval($validated['amount']);
        $years = intval($validated['years']);
        $interest = floatval($validated['interest']);
        
        $monthly_interest = ($interest / 100) / 12;
        $months = $years * 12;
        
        if ($monthly_interest == 0) {
            $result = $amount / $months;
        } else {
            $numerator = $monthly_interest * pow(1 + $monthly_interest, $months);
            $denominator = pow(1 + $monthly_interest, $months) - 1;
            $result = $amount * ($numerator / $denominator);
        }
        
        $result = round($result, 2);
        $total_amount = $result * $months;
        $total_interest = $total_amount - $amount;

        return redirect()->route('calculators.index')->with([
            'credit_result' => $result,
            'credit_total_amount' => $total_amount,
            'credit_total_interest' => $total_interest,
            'credit_months' => $months,
            'credit_amount' => $amount,
            'active_tab' => 'credit'
        ])->withInput();
    }

    public function calculateBasic(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide'
        ]);

        // Obliczenia kalkulatora podstawowego
        $num1 = floatval($validated['num1']);
        $num2 = floatval($validated['num2']);
        $operation = $validated['operation'];
        
        $result_basic = null;
        $calculation = null;
        
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
                    return redirect()->route('calculators.index')
                        ->withErrors(['division' => 'Nie można dzielić przez zero'])
                        ->withInput()
                        ->with('active_tab', 'basic');
                }
                $result_basic = $num1 / $num2;
                $operation_symbol = '÷';
                break;
        }
        
        if ($result_basic !== null) {
            $result_basic = round($result_basic, 2);
            $calculation = $num1 . ' ' . $operation_symbol . ' ' . $num2 . ' = ' . $result_basic;
        }

        return redirect()->route('calculators.index')->with([
            'basic_result' => $result_basic,
            'basic_calculation' => $calculation,
            'active_tab' => 'basic'
        ])->withInput();
    }
}