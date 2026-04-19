<?php
require_once '../functions.php';

$postId = isset($_GET['postId']) ? (int)$_GET['postId'] : 0;

$posts = [
    1 => [
        'id' => 1,
        'author' => 'Ваня Денисов',
        'author_avatar' => '/img/avatar1.png',
        'image' => '/img/picture-post1.png',
        'likes' => 203,
        'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городе, занесенном снегом по ручку двери...»',
        'date' => time() - 7200,
        'edit_allowed' => true,
    ],
    2 => [
        'id' => 2,
        'author' => 'Лиза Дёмина',
        'author_avatar' => '/img/avatar2.png',
        'image' => '/img/picture-post2.jpg',
        'likes' => 0,
        'description' => '',
        'date' => time() - 86400,
        'edit_allowed' => false,
    ],
];

if (!isset($posts[$postId])) {
    header('HTTP/1.0 404 Not Found');
    echo 'Пост не найден';
    exit;
}

$post = $posts[$postId];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['author']) ?> – пост</title>
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
        <div style="text-align: center; margin-top: 20px;">
            <a href="/home/index.php" style="color: #808080; text-decoration: none;">Вернуться к ленте</a>
        </div>
        <div style="font-size: 12px; color: gray;">ID поста: <?= $postId ?></div>
        <article class="post">
            <div class="post__header">
                <img src="<?= $post['author_avatar'] ?>" alt="Аватар" class="post__avatar">
                <span class="post__author"><?= htmlspecialchars($post['author']) ?></span>
                <?php if ($post['edit_allowed']): ?>
                    <button class="post__edit" aria-label="Редактировать">
                        <img src="/img/edit.png" alt="Редактировать">
                    </button>
                <?php endif; ?>
            </div>
            <div class="post__image">
                <img src="<?= $post['image'] ?>" alt="Фото поста">
            </div>
            <?php if ($post['likes'] > 0): ?>
                <div class="post__reactions">
                    <button class="like-btn">
                        <img src="../img/love_reaction.png" alt="Нравится" class="like-icon">
                        <span><?= $post['likes'] ?></span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (!empty($post['description'])): ?>
                <div class="post__description">
                    <p><?= htmlspecialchars($post['description']) ?></p>
                </div>
            <?php endif; ?>
            <div class="post__date">
                <?= relativeTime($post['date']) ?>
            </div>
        </article> 
    </main>
</body>
</html>