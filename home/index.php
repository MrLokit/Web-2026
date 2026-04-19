<?php
require_once '../functions.php';

$posts = [
    [
        'id' => 1,
        'title' => 'The Road Ahead',
        'author' => 'Ваня Денисов',
        'author_avatar' => '/img/avatar1.png',
        'image' => '/img/picture-post1.png',
        'likes' => 203,
        'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в гор...',
        'date' => time() - 7200,
        'edit_allowed' => true,
    ],
    [
        'id' => 2,
        'title' => 'The Road Ahead',
        'author' => 'Лиза Дёмина',
        'author_avatar' => '/img/avatar2.png',
        'image' => '/img/picture-post2.jpg',
        'likes' => 0,
        'description' => '',
        'date' => time() - 9535,
        'edit_allowed' => false,
    ],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лента</title>
    <link rel="stylesheet" href="/src/styles/home.css">
</head>
<body>
    <nav class="navigation">
        <div class="navigation__item">
            <a href="/home/index.php"><img src="/img/icon_home_active.png" alt="Главная"></a>
        </div>
        <div class="navigation__item">
            <a href="/profile/index.html"><img src="/img/icon_profile.png" alt="Профиль"></a>
        </div>
        <div class="navigation__item">
            <a href="#"><img src="/img/icon_add.png" alt="Добавить"></a>
        </div>
    </nav>

    <main class="posts">
        <?php foreach ($posts as $post): ?>
            <?php include 'post_preview.php'; ?>
        <?php endforeach; ?>
    </main>
</body>
</html>