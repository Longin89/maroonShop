<?= $this->setSiteTitle(SITE_TITLE . ' - ' . $this->product->sub_desc . ' ' . $this->product->title) ?>
<?php $this->start('body'); ?>
<section class="stuff">
    <div class="stuff__container container">
        <div class="stuff__img-wrapper">
        <div id="carouselIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <?php for($i = 0; $i < sizeof($this->images); $i++):
    $active = ($i == 0) ? 'active' : '';
    ?>
        <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?=$i ?>" class="<?= $active; ?>" aria-current="true" aria-label="Slide 1"></button>
    <?php endfor; ?>
  </div>
  <div class="carousel-inner">
  <?php for($i = 0; $i < sizeof($this->images); $i++):
    $active = ($i == 0) ? ' active' : '';
    ?>
    <div class="carousel-item <?= $active;?>">
      <img src="<?=PROOT.$this->images[$i]->url;?>" class="d-block w-100" alt="<?=$this->product->title; ?>">
    </div>
    <?php endfor; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
        <div class="stuff__desc">
            <h2 class="stuff__desc-title">
                <?= $this->product->title; ?>
            </h2>
            <p class="stuff__desc-subdesc">
                <?= $this->product->sub_desc; ?>
            </p>
            <p class="stuff__desc-about">
                <?= html_entity_decode($this->product->description); ?>
            </p>
            <details class="stuff__desc-compound">
                <summary class="stuff__compound-title">
                    Состав
                </summary>
                <p class="stuff__compound-desc">
                    <?= $this->product->compound; ?>
                </p>
            </details>
            <details class="stuff__desc-compound">
                <summary class="stuff__compound-title">
                    Способ применения
                </summary>
                <p class="stuff__compound-desc">
                    <?= $this->product->howto; ?>
                </p>
            </details>
            <div class="stuff__form-wrapper">
                <form class="stuff__form" action="/submit_order" method="post">
                    <p class="stuff__form-desc">
                        Объем:
                    </p>
                    <input class="stuff__form-radio" type="radio" id="50ml" name="capacity" value="50ml">
                    <label class="stuff__form-capacity" for="50ml">50ml</label>
                    <input class="stuff__form-radio" type="radio" id="30ml" name="capacity" value="30ml">
                    <label class="stuff__form-capacity" for="30ml">30ml</label>
                    <div class="stuff__form-cart">
                        <p class="stuff__cart-price">
                            Цена:
                            <?= $this->product->price; ?>
                            <svg width="15" height="19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.448 19v-3.619H0v-1.73h2.448v-2.368H0V9.26h2.448V0H7.74c2.458 0 4.278.47 5.46 1.41C14.399 2.35 15 3.717 15 5.508c0 1.81-.647 3.23-1.942 4.258-1.294 1.011-3.199 1.517-5.713 1.517H4.981v2.368h4.644v1.73H4.98V19H2.448Zm2.533-9.74H6.98c1.708 0 3.03-.266 3.968-.798.957-.532 1.436-1.49 1.436-2.874 0-1.206-.394-2.102-1.182-2.687-.788-.586-2.017-.879-3.687-.879H4.981v7.239Z" fill="#122947" />
                            </svg>
                        </p>
                        <p class="stuff__cart-price">
                            Доставка:
                            <?=$this->product->displayShipping()?>
                            <?php if($this->product->shipping != 0):?>
                            <svg width="15" height="19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.448 19v-3.619H0v-1.73h2.448v-2.368H0V9.26h2.448V0H7.74c2.458 0 4.278.47 5.46 1.41C14.399 2.35 15 3.717 15 5.508c0 1.81-.647 3.23-1.942 4.258-1.294 1.011-3.199 1.517-5.713 1.517H4.981v2.368h4.644v1.73H4.98V19H2.448Zm2.533-9.74H6.98c1.708 0 3.03-.266 3.968-.798.957-.532 1.436-1.49 1.436-2.874 0-1.206-.394-2.102-1.182-2.687-.788-.586-2.017-.879-3.687-.879H4.981v7.239Z" fill="#122947" />
                            </svg>
                            <?php else:?>
                            <?php endif;?>
                        </p>
                        <a href="<?=PROOT?>cart/addToCart/<?= $this->product->id; ?>" class="stuff__cart-button" type="button">
                            Добавить в корзину
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="maybelike">
    <div class="maybelike__container container">
        <h2 class="maybelike__title">
            Вам также может понравиться
        </h2>
        <div class="maybelike__slider splide" aria-label="Maybelike slider" id="maybelikeSlider">
            <div class="maybelike-wrapper splide__track">
                <ul class="maybelike__slider-list splide__list">
                    <li class="maybelike__slider-item splide__slide clean">
                        <a href="#" class="maybelike__item-link">
                            <div class="maybelike__item-wrapper">
                                <h3 class="maybelike__item-name">
                                    Clean
                                </h3>
                                <span class="maybelike__item-price">
                                    490 Р
                                </span>
                                <span class="maybelike__item-subtitle">
                                    маска для лица
                                </span>
                                <span class="maybelike__item-capacity">
                                    100g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="maybelike__slider-item splide__slide lotos">
                        <a href="#" class="maybelike__item-link">
                            <div class="maybelike__item-wrapper">
                                <h3 class="maybelike__item-name">
                                    Lotos
                                </h3>
                                <span class="maybelike__item-price">
                                    890 Р
                                </span>
                                <span class="maybelike__item-subtitle">
                                    маска для лица
                                </span>
                                <span class="maybelike__item-capacity">
                                    50ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="maybelike__slider-item splide__slide lavender">
                        <a href="#" class="maybelike__item-link">
                            <div class="maybelike__item-wrapper">
                                <h3 class="maybelike__item-name">
                                    Lavender
                                </h3>
                                <span class="maybelike__item-price">
                                    290 Р
                                </span>
                                <span class="maybelike__item-subtitle">
                                    мыло ручной работы
                                </span>
                                <span class="maybelike__item-capacity">
                                    50g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="maybelike__slider-item splide__slide coconut">
                        <a href="#" class="maybelike__item-link">
                            <div class="maybelike__item-wrapper">
                                <h3 class="maybelike__item-name">
                                    Coconut
                                </h3>
                                <span class="maybelike__item-price">
                                    990 Р
                                </span>
                                <span class="maybelike__item-subtitle">
                                    масло для тела
                                </span>
                                <span class="maybelike__item-capacity">
                                    300ml
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php $this->end(); ?>