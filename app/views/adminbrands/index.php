<?php 
$this->start('head'); ?>
<script src="/js/alertMsg.js"></script>
<link rel="stylesheet" href="/css/alertMsg.min.css">
<?php $this->end(); ?>
<?php
$this->start('body'); ?>
<h1 class="text-center my-3">Каталог брендов</h1>
<div class="card bg-light col-md-6 mx-auto">
  <div class="d-flex align-items-center">
<h2 class="col m-2">Бренды</h2>
<button type="button" class="w-25 btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#addBrandForm">
        Добавить бренд
      </button>
  </div>
  <table class="table table-bordered table-hover table-striped table-sm" id="brandsTable">
      <thead>
        <th class="text-center">ID</th>
        <th class="text-center">Наименование бренда</th>
        <th class="text-center">Действия</th>
      </thead>
      <tbody>
        <?php foreach($this->brands as $brand): ?>
          <tr data-id="<?=$brand->id?>">
            <td class="text-center"><?=$brand->id?></td>
            <td class="text-center"><?=$brand->name ?></td>
            <td class="d-flex justify-content-around">
                    <button class="btn btn-warning" onclick="editBrand('<?=$brand->id?>')"><i>Редактировать</i></button>
                    <a class="btn btn-danger" href="#" onclick="deleteBrand('<?=$brand->id?>');return false;"><i>Удалить</i></a>
                </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<?php 
$this->partial('adminbrands', 'form');
?>
<?php $this->end(); ?>

<script>

  function editBrand(id){
    jQuery.ajax({
      url : '<?=PROOT?>adminbrands/getBrandById',
      method : "POST",
      data : {id:id},
      success : function(resp){
        if(resp.success){
          jQuery('#name').val(resp.brand.name);
          jQuery('#brand_id').val(resp.brand.id);
          jQuery('#addBrandForm').modal('show');
        } else {
          jQuery('#name').val('');
          jQuery('#brand_id').val('new');
        }
      }
    })
    console.log(id);
  }

  function deleteBrand(id){
    if(confirm("Удалить бренд?")){
      jQuery.ajax({
        'url': '<?=PROOT?>adminbrands/delete',
        'method' : "POST",
        'data' : {id:id},
        'success' : function(resp){
          if(resp.success){
            alertMsg("Бренд удален",'danger');
            jQuery('tr[data-id="'+resp.model_id+'"]').remove();
          } else {
            alertMsg("Something went wrong",'warning');
          }
        }
      });
    }
  }
</script>