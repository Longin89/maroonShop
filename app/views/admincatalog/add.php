<?php $this->setSiteTitle(SITE_TITLE.' - '.'Добавление товара'); ?>
<?php $this->start('head'); ?>
<script src="/js/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '.tiny',
        branding: false,
    });
</script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="wrapper">
    <section class="add bg-secondary bg-gradient pb-3">
        <div class="add__container container">
            <h1 class="text-center my-3">Добавление товара</h1>
            <?php $this->partial('admincatalog', 'form') ?>
        </div>
    </section>
</div>
<?php $this->end(); ?>