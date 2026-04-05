<?php

function isLucky(int $number): bool 
{
    $digits = sprintf('%06d', $number);
    $sum1 = $digits[0] + $digits[1] + $digits[2];
    $sum2 = $digits[3] + $digits[4] + $digits[5];

    return $sum1 === $sum2;
}

$startInput = $_GET['start'] ?? null;
$endInput = $_GET['end'] ?? null;

if ($startInput === null || $startInput === '' || $endInput === null || $endInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Счастливые билеты</title>
        </head>
        <body>
            <form method="get">
                <p>Определение счастливого билета</p>
                <label for="start">Начальный шестизначный номер:</label>
                <input type="text" id="start" name="start" required pattern="\d{6}" title="Введите 6 цифр"><br>
                <label for="end">Конечный шестизначный номер:</label>
                <input type="text" id="end" name="end" required pattern="\d{6}" title="Введите 6 цифр"><br>
                <button type="submit">Найти</button>
            </form>
        </body>
    </html>
    <?php
    exit;
}

$start = (int)$startInput;
$end   = (int)$endInput;

if ($start > $end) {
    echo 'Ошибка: Начальный номер не может быть больше конечного.';
    exit;
}

for ($current = $start; $current <= $end; $current++) {
    if (isLucky($current)) {
        echo sprintf('%06d', $current) . '<br>';
    }
}