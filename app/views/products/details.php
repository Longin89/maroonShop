<?php $this->start('body'); ?>
<section class="catalog">
            <div class="catalog__container container">
                <div class="catalog__filter">
                    <h2 class="catalog__filter-title">
                        Каталог
                    </h2>

                    <button class="catalog__filter-button">
                        Фильтр
                    </button>
                    <div class="catalog__filter-wrapper">
                        <form class="catalog__filter-form" id="filterForm">
                            <div class="catalog__filter-item">
                                <h3 class="catalog__item-title">
                                    Уход для лица
                                </h3>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="cream"><span class="catalog__radio-span">Крема</span><br>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="serum"><span class="catalog__radio-span">Сыворотки</span><br>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="mask"><span class="catalog__radio-span">Маски</span><br>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="foam" disabled><span class="catalog__radio-span">Пенки</span><br>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="tonic" disabled><span class="catalog__radio-span">Тоники</span><br>
                                <input class="catalog__item-radio" type="radio" name="faceCare" value="powder"><span class="catalog__radio-span">Пудры</span><br>
                            </div>
                            
    
                            <div class="catalog__filter-item">
                                <h3 class="catalog__item-title">
                                    Уход для тела
                                </h3>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="cream" disabled><span class="catalog__radio-span">Крема</span><br>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="oil"><span class="catalog__radio-span">Масла</span><br>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="scrub" disabled><span class="catalog__radio-span">Скрабы</span><br>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="soap"><span class="catalog__radio-span">Мыло</span><br>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="bombs"><span class="catalog__radio-span">Бомбочки для ванны</span><br>
                                <input class="catalog__item-radio" type="radio" name="bodyCare" value="salt" disabled><span class="catalog__radio-span">Соль для ванны</span><br>
                            </div>
                            
                            <div class="catalog__filter-item">
                                <h3 class="catalog__item-title">
                                    Тип кожи
                                </h3>
                                <input class="catalog__item-radio" type="radio" name="skinType" value="normal" disabled><span class="catalog__radio-span">Нормальная</span><br>
                                <input class="catalog__item-radio" type="radio" name="skinType" value="dry"><span class="catalog__radio-span">Сухая</span><br>
                                <input class="catalog__item-radio" type="radio" name="skinType" value="oily" disabled><span class="catalog__radio-span">Жирная</span><br>
                                <input class="catalog__item-radio" type="radio" name="skinType" value="combine"><span class="catalog__radio-span">Комбинированная</span><br>
                                <div class="catalog__button-wrapper">
                                    <button class="catalog__filter-button">
                                        Применить
                                    </button>
                                    <button class="catalog__filter-button" type="reset">
                                        Сбросить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="catalog__list">
                    <li class="catalog__list-item high">
                    <a href="./high.php" class="catalog__item-link">
                        <div class="catalog__item-wrapper">
                            <h3 class="catalog__item-name">
                                High
                            </h3>
                            <span class="catalog__item-price">
                                990 Р
                            </span>
                            <span class="catalog__item-desc">
                                крем для лица
                            </span>
                            <span class="catalog__item-capacity">
                                50ml
                            </span>
                        </div>
                    </a>    
                    </li>
                    <li class="catalog__list-item rest">
                        <a href="rest.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Rest
                                </h3>
                                <span class="catalog__item-price">
                                    690 Р
                                </span>
                                <span class="catalog__item-desc">
                                    минеральная пудра
                                </span>
                                <span class="catalog__item-capacity">
                                    20g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item rose">
                        <a href="rose.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Rose
                                </h3>
                                <span class="catalog__item-price">
                                    890 Р
                                </span>
                                <span class="catalog__item-desc">
                                    крем для лица
                                </span>
                                <span class="catalog__item-capacity">
                                    50ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item milk">
                        <a href="milk.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Milk
                                </h3>
                                <span class="catalog__item-price">
                                    790 Р
                                </span>
                                <span class="catalog__item-desc">
                                    масло для тела
                                </span>
                                <span class="catalog__item-capacity">
                                    150ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item paradise">
                        <a href="paradise.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Paradise
                                </h3>
                                <span class="catalog__item-price">
                                    590 Р
                                </span>
                                <span class="catalog__item-desc">
                                    минеральная пудра
                                </span>
                                <span class="catalog__item-capacity">
                                    15g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item sun">
                        <a href="sun.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Sun
                                </h3>
                                <span class="catalog__item-price">
                                    90 Р
                                </span>
                                <span class="catalog__item-desc">
                                    бомбочка для ванны
                                </span>
                                <span class="catalog__item-capacity">
                                    20g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item violet">
                        <a href="violet.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Violet
                                </h3>
                                <span class="catalog__item-price">
                                    890 Р
                                </span>
                                <span class="catalog__item-desc">
                                    крем для лица
                                </span>
                                <span class="catalog__item-capacity">
                                    50ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item clean">
                        <a href="clean.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Clean
                                </h3>
                                <span class="catalog__item-price">
                                    490 Р
                                </span>
                                <span class="catalog__item-desc">
                                    маска для лица
                                </span>
                                <span class="catalog__item-capacity">
                                    100g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item coconut">
                        <a href="coconut.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Coconut
                                </h3>
                                <span class="catalog__item-price">
                                    990 Р
                                </span>
                                <span class="catalog__item-desc">
                                    масло для тела
                                </span>
                                <span class="catalog__item-capacity">
                                    300ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item lavender">
                        <a href="lavender.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Lavender
                                </h3>
                                <span class="catalog__item-price">
                                    290 Р
                                </span>
                                <span class="catalog__item-desc">
                                    мыло ручной работы
                                </span>
                                <span class="catalog__item-capacity">
                                    50g
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item lotos">
                        <a href="lotos.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Lotos
                                </h3>
                                <span class="catalog__item-price">
                                    890 Р
                                </span>
                                <span class="catalog__item-desc">
                                    маска для лица
                                </span>
                                <span class="catalog__item-capacity">
                                    50ml
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="catalog__list-item earth">
                        <a href="earth.php" class="catalog__item-link">
                            <div class="catalog__item-wrapper">
                                <h3 class="catalog__item-name">
                                    Earth
                                </h3>
                                <span class="catalog__item-price">
                                    90 Р
                                </span>
                                <span class="catalog__item-desc">
                                    бомбочка для ванны
                                </span>
                                <span class="catalog__item-capacity">
                                    20g
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="recently">
            <div class="recently__container container">
                <h2 class="recently__title">
                    Вы недавно смотрели
                </h2>
                <div class="recently__slider splide" aria-label="Recently slider" id="recentlySlider">
                    <div class="recently__slider-wrapper splide__track">
                      <ul class="recently__slider-list splide__list">
                        <li class="recently__slider-item splide__slide clean">
                            <a href="./clean.php" class="recently__item-link">
                                <div class="recently__item-wrapper">
                                    <h3 class="recently__item-name">
                                        Clean
                                    </h3>
                                    <span class="recently__item-price">
                                        490 Р
                                    </span>
                                    <span class="recently__item-subtitle">
                                        маска для лица
                                    </span>
                                    <span class="recently__item-capacity">
                                        100g
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="recently__slider-item splide__slide lotos">
                            <a href="./lotos.php" class="recently__item-link">
                                <div class="recently__item-wrapper">
                                    <h3 class="recently__item-name">
                                        Lotos
                                    </h3>
                                    <span class="recently__item-price">
                                        890 Р
                                    </span>
                                    <span class="recently__item-subtitle">
                                        маска для лица
                                    </span>
                                    <span class="recently__item-capacity">
                                        50ml
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="recently__slider-item splide__slide lavender">
                            <a href="./lavender.php" class="recently__item-link">
                                <div class="recently__item-wrapper">
                                    <h3 class="recently__item-name">
                                        Lavender
                                    </h3>
                                    <span class="recently__item-price">
                                        290 Р
                                    </span>
                                    <span class="recently__item-subtitle">
                                        мыло ручной работы
                                    </span>
                                    <span class="recently__item-capacity">
                                        50g
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="recently__slider-item splide__slide coconut">
                            <a href="./coconut.php" class="recently__item-link">
                                <div class="recently__item-wrapper">
                                    <h3 class="recently__item-name">
                                        Coconut
                                    </h3>
                                    <span class="recently__item-price">
                                        990 Р
                                    </span>
                                    <span class="recently__item-subtitle">
                                        масло для тела
                                    </span>
                                    <span class="recently__item-capacity">
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
        <section class="join">
<?php  $this->end(); ?>