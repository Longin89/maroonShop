<?php use Core\FH;?>

<?php $this->start('body')?>
  <section class="delivery">
    <div class="delivery__container container">
      <h3 class="delivery__title text-center">Информация для доставки</h3>
      <form class="delivery__form" action="<?=PROOT?>cart/checkout/<?=$this->cartId?>" method="post">
        <?= FH::csrfInput()?>
        <?= FH::displayErrors($this->displayErrors); ?>
          <input type="hidden" name="step" value="1" />
          <?= FH::inputBlock('input','ФИО','name',$this->tx->name,['class'=>'form-control form-control-sm', 'required' => 'true'],['class'=>'form-group col-md-4'])?>
          <?= FH::inputBlock('input','Город','shipping_city',$this->tx->shipping_city,['class'=>'form-control form-control-sm', 'required' => 'true'],['class'=>'form-group col-md-4'])?>
          <?= FH::inputBlock('input','Адрес доставки','shipping_address',$this->tx->shipping_address,['class'=>'form-control form-control-sm','required' => 'true'], ['class'=>'form-group col-md-4'])?>
          <?= FH::inputBlock('input','Код почтового отделения','shipping_zip',$this->tx->shipping_zip,['class'=>'form-control form-control-sm', 'required' => 'true'],['class'=>'form-group col-md-4'])?>
        <button class="delivery__button btn btn-lg btn-primary">Продолжить</button>
      </form>
    </div>
  </section>
    <div class="col-md-4"><?php $this->partial('cart','product_preview')?></div>
<?php $this->end() ?>