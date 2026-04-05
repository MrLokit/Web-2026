<?php

function getZodiacSign(string $dateString): string
{
    $parts = explode('.', $dateString);
    
    if (count($parts) != 3) {
        return 'Ошибка: дата должна быть в формате ДД.ММ.ГГГГ';
    }
    
    $day   = (int)$parts[0];
    $month = (int)$parts[1];
    
    if ($month < 1 || $month > 12 || $day < 1 || $day > 31) {
        return 'Ошибка: некорректный день или месяц';
    }
    
    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        return 'Овен';
    }
    if (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        return 'Телец';
    }
    if (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        return 'Близнецы';
    }
    if (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        return 'Рак';
    }
    if (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        return 'Лев';
    }
    if (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        return 'Дева';
    }
    if (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        return 'Весы';
    }
    if (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        return 'Скорпион';
    }
    if (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        return 'Стрелец';
    }
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        return 'Козерог';
    }
    if (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        return 'Водолей';
    }
    if (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        return 'Рыбы';
    }
    
    return 'Неизвестный знак';
}

$dateInput = $_GET['date'] ?? null;

if ($dateInput === null || $dateInput === '')
{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Знак зодиака по дате</title>
        </head>
        <body>
            <form method="get">
                <p>Определение знака зодиака</p>
                <label for="date">Введите дату в формате ДД.ММ.ГГГГ (например, 15.04.1452):</label>
                <input type="text" id="date" name="date" required>
                <button type="submit">Определить</button>
            </form>
        </body>
    </html>
    <?php
    exit;
}

echo getZodiacSign($dateInput);