<?= $this->setSiteTitle(SITE_TITLE.' - Home'); ?>

<?php $this->start('body'); ?>
<section class="natural">
          <div class="natural__container container">
            <ul class="natural__list">
              <li class="natural list-item">
                <img src="images/for_face.jpg" alt="cosmetics for face">
                <a href="for_face.php" class="natural__list-link">
                  Уход для лица
                </a>
              </li>
              <li class="natural list-item">
                <h1 class="natural__item-title">
                  Maroon
                </h1>
                <p class="natural__item-subtitle">
                  Натуральная косметика
                  для бережного ухода за кожей
                </p>
                <a href="#" class="natural__item-link">
                  Подробнее
                </a>
              </li>
              <li class="natural list-item">
                <img src="images/for_body.jpg" alt="cosmetics for body">
                <a href="for_body.php" class="natural__list-link">
                  Уход для тела
                </a>
              </li>
            </ul>
          </div>
        </section>
        <section class="bestsellers">
          <div class="bestsellers__container container">
            <div class="bestsellers__desc">
              <h2 class="bestsellers__desc-title">
                Бестселлеры
              </h2>
              <span class="bestsellers__desc-subtitle">
                Легендарные продукты,
                завоевавшие любовь
                наших клиентов
              </span>
              <a href="./catalog.php" class="bestsellers__desc-link">
                Смотреть все
              </a>
            </div>
            <div class="bestsellers__slider splide" aria-label="Cosmetics slider" id="bestsellersSlider">
              <div class="bestsellers__slider-wrapper splide__track">
                <ul class="bestsellers__slider-list splide__list">
                  <li class="bestsellers__slider-item splide__slide slide-one">
                    <h3 class="bestsellers__item-title">
                      High
                    </h3>
                    <span class="bestsellers__slider-subtitle">
                      крем для лица
                    </span>
                    <a href="/php/high.php" class="bestsellers__slider-link">
                      Подробнее
                    </a>
                  </li>
                  <li class="bestsellers__slider-item splide__slide slide-two">
                    <h3 class="bestsellers__item-title">
                      Rest
                    </h3>
                    <span class="bestsellers__slider-subtitle">
                      минеральная пудра
                    </span>
                    <a href="/php/rest.php" class="bestsellers__slider-link">
                      Подробнее
                    </a>
                  </li>
                  <li class="bestsellers__slider-item splide__slide slide-three">
                    <h3 class="bestsellers__item-title">
                      Rose
                    </h3>
                    <span class="bestsellers__slider-subtitle">
                      крем для лица
                    </span>
                    <a href="/php/rose.php" class="bestsellers__slider-link">
                      Подробнее
                    </a>
                  </li>
                  <li class="bestsellers__slider-item splide__slide slide-four">
                    <h3 class="bestsellers__item-title">
                      Milk
                    </h3>
                    <span class="bestsellers__slider-subtitle">
                      масло для тела
                    </span>
                    <a href="/php/milk.php" class="bestsellers__slider-link">
                      Подробнее
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section class="spring">
          <div class="spring__container container">
            <div class="spring__desc">
              <h2 class="spring__desc-title">
                Встречайте весну вместе с нами
              </h2>
              <span class="spring__desc-subtitle">
                Попробуйте новую коллекцию ухаживающих средств для лица с SPF защитой
              </span>
              <a href="#" class="spring__desc-link">
                Подробнее
              </a>
            </div>
          </div>
        </section>
        <section class="individual">
          <div class="individual__container container">
            <div class="individual__desc">
              <h2 class="individual__desc-title">
                Индивидуальный уход
              </h2>
              <span class="individual__desc-subtitle">
                Не всегда очевидно, какие элементы и минералы необходимы коже, а многочисленные эксперименты с разными средствами только ухудшают ее качество.
                <br>
                <br>
                Заполните анкету, и мы подберем уход, подходящий именно вам, учитывая ваш образ жизни, место жительства и другие факторы.
              </span>
              <a href="#" class="individual__desc-link">
                Заполнить анкету
              </a>
            </div>
            <img src="../images/individual_pic.jpg" alt="individual picture" class="individual__img">
          </div>
        </section>
        <section class="history">
          <div class="history__container container">
            <h2 class="history__title">
              “Мы стремимся сделать уход за кожей доступным и приятным ритуалом для всех, кто хочет заботиться о себе и своем теле”
            </h2>
            <a href="#" class="history__link">
              Наша история
            </a>
          </div>
        </section>
        <section class="join">
          <div class="join__container container">
            <ul class="join__list">
              <li class="join__list-item">
                <img src="../images/grid_1.jpg" alt="cream photo">
              </li>
              <li class="join__list-item">
                <img src="../images/grid_2.jpg" alt="samples photo">
              </li>
              <li class="join__list-item">
                <img src="../images/grid_3.jpg" alt="face photo">
              </li>
              <li class="join__list-item">
                <img src="../images/grid_4.jpg" alt="cosmetics photo">
              </li>
              <li class="join__list-item">
                <img src="../images/grid_5.jpg" alt="plant photo">
              </li>
              <li class="join__list-item">
                <img src="../images/grid_6.jpg" alt="parfume photo">
              </li>
            </ul>
            <div class="join__desc">
              <h2 class="join__desc-title">
                Присоединяйтесь к нам
              </h2>
              <span class="join__desc-subtitle">
                Подпишитесь на наш аккаунт @marooncare
                и узнавайте о новиках и акциях первыми
              </span>
              <button class="join__desc-subscribe">
                Подписаться
              </button>
            </div>
          </div>
        </section>
        <section class="contacts" id="contacts">
          <div class="contacts__container container">
            <ul class="contacts__list">
              <li class="contacts__list-item">
                <h2 class="contacts__title">
                  Контакты
                </h2>
              </li>
              <li class="contacts__list-item">
                <h3 class="contacts__item-title">
                  Адрес
                </h3>
                <span class="contacts__item-desc">
                  Санкт-Петербург,<br>
                  ул. Большая Конюшенная, 19
                </span>
              </li>
              <li class="contacts__list-item">
                <h3 class="contacts__item-title">
                  Телефон
                </h3>
                <a href="tel:+79238889060" class="contacts__item-link">
                  +7 (923) 888-90-60
                </a>
              </li>
              <li class="contacts__list-item">
                <h3 class="contacts__item-title">
                  E-mail
                </h3>
                <a href="mailto:info@maroon.ru" class="contacts__item-link">
                  info@maroon.ru
                </a>
              </li>
              <li class="contacts__list-item">
                <a href="#" class="contacts__item-link social">
                  <svg width="11" height="18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.286 7H11l-.524 2h-4.19v9H4.19V9H0V7h4.19V5.128c0-1.783.195-2.43.56-3.082A3.726 3.726 0 0 1 6.334.534C7.017.186 7.694 0 9.563 0c.546 0 1.026.05 1.437.15V2H9.563c-1.387 0-1.81.078-2.24.298a1.668 1.668 0 0 0-.725.692c-.23.411-.312.814-.312 2.138V7Z" fill="#122947"/></svg>
                </a>
                <a href="#" class="contacts__item-link social">
                  <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 7a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm0-2a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm6.5-.25a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0ZM10 2c-2.474 0-2.878.007-4.029.058-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703 2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C2.006 7.075 2 7.461 2 10c0 2.474.007 2.878.058 4.029.037.783.142 1.31.331 1.797.17.435.37.748.702 1.08.337.336.65.537 1.08.703.494.191 1.02.297 1.8.333C7.075 17.994 7.461 18 10 18c2.474 0 2.878-.007 4.029-.058.782-.037 1.309-.142 1.797-.331a2.92 2.92 0 0 0 1.08-.702c.337-.337.538-.65.704-1.08.19-.493.296-1.02.332-1.8.052-1.104.058-1.49.058-4.029 0-2.474-.007-2.878-.058-4.029-.037-.782-.142-1.31-.332-1.798a2.91 2.91 0 0 0-.703-1.08 2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C12.925 2.006 12.539 2 10 2Zm0-2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153.509.5.902 1.105 1.153 1.772.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772c-.5.508-1.105.902-1.772 1.153-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153A4.904 4.904 0 0 1 .525 16.55C.277 15.913.11 15.187.06 14.122.013 13.056 0 12.717 0 10c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 3.45.525C4.088.277 4.812.11 5.878.06 6.944.013 7.283 0 10 0Z" fill="#122947"/></svg>
                </a>
                <a href="#" class="contacts__item-link social">
                  <svg width="20" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.864 2.044c-.758 0-1.485.304-2.026.848a2.997 2.997 0 0 0-.865 2.06l-.028 1.608a.626.626 0 0 1-.209.453.595.595 0 0 1-.47.142L8.71 6.938C6.662 6.652 4.7 5.686 2.818 4.08c-.597 3.38.568 5.722 3.373 7.528l1.742 1.122a.607.607 0 0 1 .28.497.626.626 0 0 1-.246.517l-1.588 1.188c.944.06 1.84.017 2.585-.134 4.704-.962 7.832-4.588 7.832-10.568 0-.488-1.01-2.186-2.932-2.186ZM8.98 4.914a5.087 5.087 0 0 1 .864-2.753A4.908 4.908 0 0 1 12.048.358 4.777 4.777 0 0 1 14.86.105c.941.201 1.803.682 2.479 1.382.709-.005 1.312.179 2.661-.659-.334 1.675-.498 2.402-1.21 3.402 0 7.804-4.684 11.6-9.436 12.57-3.258.666-7.996-.428-9.354-1.88.692-.055 3.504-.364 5.129-1.583C3.754 12.41-1.72 9.111 1.877.242c1.688 2.02 3.4 3.394 5.135 4.123 1.155.485 1.438.475 1.968.55l-.001-.002Z" fill="#122947"/></svg>
                </a>
              </li>
            </ul>
            <div class="contacts__map" id="map">
            </div>
          </div>
        </section>    
<?php $this->end(); ?>
<?php $this->start('footer'); ?>
<?php $this->end(); ?>