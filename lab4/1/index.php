<?php

function isLeapYear(int $year): bool 
{
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

$yearInput = $_GET['year'] ?? null;

if ($yearInput === null || empty($yearInput)) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Високосный год</title>
        </head>
        <body>
            <form method="get">
                <p>Определение високосного года</p>
                <label for="year">Введите год:</label>
                <input type="number" id="year" name="year" min="1" max="30000" required>
                <button type="submit">Проверить</button>
            </form>
        </body>
    </html>
    <?php
    exit; 
}

$year = (int)$yearInput;

if (isLeapYear($year)) {
    echo 'YES';
} 
else {
    echo 'NO';
}