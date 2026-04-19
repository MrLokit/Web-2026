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
        <a href="/post/<?= $post['id'] ?>">
            <img src="<?= $post['image'] ?>" alt="Фото поста">
        </a>
    </div>
    <?php if ($post['likes'] > 0): ?>
        <div class="post__reactions">
            <button class="like-btn">
                <img src="/img/love_reaction.png" alt="Нравится" class="like-icon">
                <span><?= $post['likes'] ?></span>
            </button>
        </div>
    <?php endif; ?>
    <?php if (!empty($post['description'])): ?>
        <div class="post__description">
            <p><?= htmlspecialchars($post['description']) ?></p>
            <button class="post__more">ещё</button>
        </div>
    <?php endif; ?>
    <div class="post__date">
        <?= relativeTime($post['date']) ?>
    </div>
</article>