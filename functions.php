<?php

/** Склонение существительных после числительных */
function declension(int $number, string $one, string $two, string $many): string
{
    $mod10 = $number % 10;
    $mod100 = $number % 100;

    if ($mod100 >= 11 && $mod100 <= 19) {
        return $many;
    }
    if ($mod10 === 1) {
        return $one;
    }
    if ($mod10 >= 2 && $mod10 <= 4) {
        return $two;
    }
    return $many;
}

/** Возвращает относительное время */
function relativeTime(int $timestamp): string
{
    $diff = time() - $timestamp;

    if ($diff < 60) {
        return 'только что';
    }
    if ($diff < 3600) {
        $minutes = floor($diff / 60);
        return $minutes . ' ' . declension($minutes, 'минута', 'минуты', 'минут') . ' назад';
    }
    if ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' ' . declension($hours, 'час', 'часа', 'часов') . ' назад';
    }
    if ($diff < 172800) {
        return 'вчера';
    }
    return date('j F Y', $timestamp);
}