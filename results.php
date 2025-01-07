<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = intval($_POST['number']);

    // Check if a Number is Prime
    function primeCheck($number)
    {
        if ($number <= 1) return "Not Prime";
        
        // Use Square Root to Check Faster in Terms of Time Complexity to Avoid Checking Until n($number)
        // Time Complexity: O(n)
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) return "Not Prime";
        }
        return "Prime";
    }

    // Calculate the Factorial
    function calculateFactorial($number)
    {
        // Factorial of 0 is 1
        if ($number === 0) return 1;

        // Too Large Validation
        if ($number > 170) {
            return "Factorial too Large to Compute";
        }

        $factorial = 1;
        for ($i = 1; $i <= $number; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }

    // Get Result
    $primeResult = primeCheck($number);
    $factorialResult = calculateFactorial($number);

    // Return Results as JSON
    echo json_encode([
        'prime' => $primeResult,
        'factorial' => $factorialResult
    ]);
    exit;
}
