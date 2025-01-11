<?php

use App\Models\Users;
use Core\H;
?>

<?php $this->start('head'); ?>
<script>
    function confirmRemoveItem(href) {
        if (confirm("Удалить?")) {
            window.location.href = href;
        }
        return false;
    }
</script>
<?php $this->end(); ?>
<?php $this->setSiteTitle(SITE_TITLE . ' - ' . 'Корзина'); ?>
<?php $this->start('body') ?>
<section class="cart">
    <div class="cart__container container">
    <?php if (sizeof($this->items) == 0): ?>
        <h2 class="cart__title">
            Ваша корзина пуста, <?= $this->user->fname; ?>
        </h2>
        <?php else: ?>
            <h2 class="cart__title">
            Ваша корзина, <?= $this->user->fname; ?>
        </h2>
        <?php endif; ?>
        <div class="cart__wrapper">
            <ul class="cart__list">
                <?php foreach ($this->items as $item): ?>
                    <li class="cart__list-item">
                        <img class="cart__item-img" src="<?= PROOT . $item->url; ?>" alt="<?= $item->title; ?>">
                        <div class="cart__item-link">
                            <a class="cart__link-title" href="<?= PROOT ?>catalog/details/<?= $item->catalog_id ?>"><?= $item->title; ?></a>
                            <p class="cart__link-subdesc"><?= $item->sub_desc; ?></p>

                        </div>
                        <div class="cart__item-qty">
                            <span class="cart__qty-desc">Кол-во</span>
                            <div class="cart__qty-ctrl">
                                <a class="cart__qty-up" href="<?= PROOT ?>cart/changeQty/up/<?= $item->id; ?>"></a>
                                <input class="cart__qty-input" readonly value=<?= $item->qty; ?>>
                                <?php if ($item->qty > 1): ?>
                                    <a class="cart__qty-down" href="<?= PROOT ?>cart/changeQty/down/<?= $item->id; ?>"></a>
                                <?php elseif ($item->qty == 1): ?>
                                    <a class="cart__qty-down" style="visibility:hidden;" href="<?= PROOT ?>cart/changeQty/down/<?= $item->id; ?>"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="cart__item-additional">
                            <p class="cart__additional-price">Цена: <?= $item->price; ?> руб.</p>
                            <p class="cart__additional-shipping">Доставка за шт.: <?= $item->shipping; ?> руб.</p>
                            <a class="cart__additional-delete" href="<?= PROOT ?>cart/removeItem/<?= $item->id; ?>" onclick='confirmRemoveItem("<?= PROOT ?>cart/removeItem/<?= $item->id; ?>");return false;'>Удалить</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php if (sizeof($this->items) != 0): ?>
                <aside class="cart__info">
                    <a href="<?= PROOT ?>cart/checkout/<?=$this->cartId?>" class="cart__info-proceed">Продолжить</a>
                    <div class="cart__info-item">
                        <p class="cart__item-qty">Всего товаров: <?= $this->itemCount; ?> шт.</p>
                        <hr>
                        <p class="cart__item-sum">Общая сумма: <?= $this->grandTotal; ?> руб.</p>
                        <p class="cart__item-shipping">В т.ч. доставка: <?= $this->shippingTotal; ?> руб.</p>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php $this->end(); ?>