<?php

function factorial(int $n): int
{
    if ($n < 0) {
        return 0;
    }
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

$numberInput = $_GET['n'] ?? null;

if ($numberInput === null || $numberInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Факториал</title>
        </head>
        <body>
            <form method="get">
                <p>Определение факториала</p>
                <label for="n">Введите целое число:</label>
                <input type="number" id="n" name="n" min="1" max="20" required>
                <button type="submit">Вычислить</button>
            </form>
        </body>
    </html>
    <?php
    exit;
}

$number = (int)$numberInput;

echo factorial($number);