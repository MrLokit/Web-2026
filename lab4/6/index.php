<?php

function evaluateRPN(string $expression): int
{
    $stack = [];
    $tokens = explode(' ', $expression);

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            $stack[] = (int)$token;
        } 
        else {
            $right = array_pop($stack);
            $left  = array_pop($stack);

            switch ($token) {
                case '+':
                    $stack[] = $left + $right;
                    break;
                case '-':
                    $stack[] = $left - $right;
                    break;
                case '*':
                    $stack[] = $left * $right;
                    break;
                case '/':
                    $stack[] = $left / $right;
                    break;
                case '%':
                    $stack[] = $left % $right;
                    break;
                default:
                    return 0;
            }
        }
    }
    return array_pop($stack);
}

$expressionInput = $_GET['expr'] ?? null;

if ($expressionInput === null || $expressionInput === '') {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Обратная польская запись</title>
    </head>
    <body>
        <form method="get">
            <p>Постфиксная запись</p>
            <label for="expr">Введите выражение в постфиксной записи:</label><br>
            <input type="text" id="expr" name="expr" required placeholder="Например: 8 9 + 1 7 - *">
            <button type="submit">Вычислить</button>
        </form>
    </body>
    </html>
    <?php
    exit;
}

$result = evaluateRPN(trim($expressionInput));
echo $result;