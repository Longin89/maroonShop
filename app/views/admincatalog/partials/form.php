<?php

use Core\FH;
use Core\Session; ?>
<?= Session::displayMsg(); ?>
<form action="<?= $this->formAction ?>" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap gap-5 justify-content-between">
    <?= FH::csrfInput(); ?>
    <?= FH::displayErrors($this->displayErrors); ?>
    <input type="hidden" id="images_sorted" name="images_sorted" value="" />
    <?= FH::selectBlock('Бренд','brand_id',$this->product->brand_id,$this->brands,['class'=>'form-control input-sm text-center'],['class'=>'form-group col-md-2']) ?>
    <?= FH::inputBlock('text', 'Название', 'title', $this->product->title, ['class' => 'form-control input-sm'], ['class' => 'form-group col-md-3']); ?>
    <?= FH::inputBlock('text', 'Цена доставки (только цифры)', 'shipping', $this->product->shipping, ['class' => 'form-control input-sm'], ['class' => 'form-group col-md-3']); ?>
    <?= FH::inputBlock('text', 'Цена товара (только цифры)', 'price', $this->product->price, ['class' => 'form-control input-sm'], ['class' => 'form-group col-md-3']); ?>
    <?= FH::inputBlock('text', 'Емкость (только цифры)', 'capacity', $this->product->capacity, ['class' => 'form-control input-sm'], ['class' => 'form-group col-md-4']); ?>
    <?= FH::inputBlock('text', 'Краткое описание', 'sub_desc', $this->product->sub_desc, ['class' => 'form-control input-sm'], ['class' => 'form-group col-md-4']); ?>
    <?= FH::inputTextarea('Описание товара', 'description', $this->product->description, ['class' => 'form-control input-sm tiny'], ['class' => 'form-group col-md-4']); ?>
    <?= FH::inputTextarea('Состав', 'compound', $this->product->compound, ['class' => 'form-control input-sm', 'rows' => '16'], ['class' => 'form-group col-md-4']); ?>
    <?= FH::inputTextarea('Способ применения', 'howto', $this->product->howto, ['class' => 'form-control input-sm', 'rows' => '5'], ['class' => 'form-group col-md-4']); ?>
    
    <?php echo '<div class="d-flex align-items-end justify-content-between col-md-4">'; ?>
    <?php echo '<div class="d-flex flex-column align-items-end aria-label="Выбор типа кожи"">'; ?>
    <?php echo '<p>' . 'Тип кожи:' . '</p>'; ?>
    <?= FH::inputRadio('Сухая', 'skin', 'сухая', $this->product->skin, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?= FH::inputRadio('Жирная', 'skin', 'жирная', $this->product->skin, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?= FH::inputRadio('Нормальная', 'skin', 'нормальная', $this->product->skin, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?= FH::inputRadio('Комбинированная', 'skin', 'комбинированная', $this->product->skin, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?php echo '</div>'; ?>
    <?php echo '<div class="d-flex flex-column align-items-end aria-label="Выбор назначения продукта"">'; ?>
    <?php echo '<p>' . 'Назначение:' . '</p>'; ?>
    <?= FH::inputRadio('Для лица', 'purpose', 'для лица', $this->product->purpose, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?= FH::inputRadio('Для тела', 'purpose', 'для тела', $this->product->purpose, ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']); ?>
    <?php echo '<p class="my-1">' . 'Дополнительно:' . '</p>'; ?>
    <?= FH::checkboxBlock('Акция', 'featured', $this->product->isChecked(), ['class' => 'ms-1'], ['class' => 'd-inline-block my-1']) ?>
    <?php echo '</div>'; ?>
    <?php echo '</div>'; ?>
    <?php echo '<div class="d-flex flex-column align-items-center col-md-5 aria-label="Загрузка картинки">'; ?>
    <label for="catalogImages" class="control-label py-2">Загрузить картинку</label>
    <input type="file" multiple name="catalogImages[]" id="catalogImages">
    <?php echo '</div>'; ?>

    <?php echo '<div class="d-flex align-items-end justify-content-around col-md-4">'; ?>
    <?= FH::submitTag('Сохранить', ['class' => 'btn btn-lg btn-primary justify-content-center']); ?>
    <a href="<?=PROOT?>admincatalog" class="btn btn-lg btn-danger d-flex justify-content-center">Отмена</a>
    <?php echo '</div>'; ?>
    <?php $this->partial('admincatalog', 'editImages'); ?>
</form>