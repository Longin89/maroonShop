<?php $this->setSiteTitle(SITE_TITLE . ' - ' . 'Оформление'); ?>
<?php $this->start('body'); ?>
<?php

use core\FH;
use Core\H;
?>

<input type="hidden" name="step" value="2" />
<?=FH::hiddenInput('name',$this->tx->name)?>
      <?=FH::hiddenInput('shipping_address',$this->tx->shipping_address)?>
      <?=FH::hiddenInput('shipping_city',$this->tx->shipping_city)?>
      <?=FH::hiddenInput('shipping_zip',$this->tx->shipping_zip)?>
<section class="credit">
    <h2 class="credit__title">Оплатите заказ</h2>
    <div class="credit__container container">
        <div class="credit__info">
            <img class="credit__info-visa" src="/images/visa.png" alt="visa logo">
            <p class="credit__info-sum">Итого за товары: <?= $this->grandTotal ?> руб.</p>
            <p class="credit__info-delivery">В том числе доставка: <?= $this->shippingTotal ?> руб.</p>
            <img class="credit__info-chip" src="/images/chip.png" alt="chip">
        </div>
        <?php
        ?>
        <div class="credit__payment">
            <form action="<?= PROOT ?>cart/checkout/<?= $this->cartId ?>"method="post" class="credit__payment-checkout" id="checkout">
                <?= FH::csrfInput(); ?>
                <label class="credit__payment-label" for="cardnumber">Номер карты</label>
                <input id="cardnumber" type=text pattern="[0-9]{13,16}" name="cardnumber" placeholder="0123456789012345">
                <label class="credit__label-owner" for="cardholder">Владелец карты</label>
                <input id="cardholder" type="text" name="name" maxlength="50" placeholder="Владелец карты">
                <label class="credit__label-form">Срок действия и CVC-код</label>
                <div class="credit__payment-form">
                    <div class="credit__form-wrapper" id="expdate">
                        <?= FH::selectBlock(
                            '',
                            'month',
                            ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                            ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
                            ['class' => 'credit__select-form form-control input-sm text-center'],
                            ['class' => 'credit__wrapper-select form-group col-md-4']
                        ) ?>
                        <span class="mx-1">/</span>
                        <?= FH::selectBlock(
                            '',
                            'year',
                            ['2022', '2023', '2024', '2025'],
                            ['22', '23', '24', '25'],
                            ['class' => 'credit__select-form form-control input-sm text-center'],
                            ['class' => 'credit__wrapper-select form-group col-md-4']
                        ) ?>
                    </div>
                    <div class="credit__payment-cvc">
                        <input id="cvc" type="text" placeholder="CVC" maxlength="3" />
                    </div>
                </div>
                <input class="credit__checkout-btn" type="submit" name="purchase" value="Оплатить" formmethod="post">
            </form>
        </div>
    </div>
</section>
<?php $this->end(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
print_r($_POST);
}
?>