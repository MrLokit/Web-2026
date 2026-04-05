<?php

function digitToWord(int $digit): string
{
    switch ($digit) {
        case 0:
            return 'Ноль';
        case 1:
            return 'Один';
        case 2:
            return 'Два';
        case 3:
            return 'Три';
        case 4:
            return 'Четыре';
        case 5:
            return 'Пять';
        case 6:
            return 'Шесть';
        case 7:
            return 'Семь';
        case 8:
            return 'Восемь';
        case 9:
            return 'Девять';
        default:
            return 'Неизвестная цифра';
    }
}

$digitInput = $_GET['digit'] ?? null;

if ($digitInput === null || $digitInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Цифра в слово</title>
        </head>
        <body>
            <form method="get">
                <p>Цифра => Слово</p>
                <label for="digit">Введите цифру (0-9):</label>
                <input type="number" id="digit" name="digit" min="0" max="9"required>
                <button type="submit">Преобразовать</button>
            </form>
        </body>
    </html>
    <?php
    exit;
}

$digit = (int)$digitInput;

echo digitToWord($digit);