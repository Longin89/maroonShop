<?php

use Core\FH;
use Core\H;
?>
<!-- Modal -->
<div class="modal fade" id="addBrandForm" tabindex="-1" aria-labelledby="addBrandFormLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addBrandFormLabel">Добавить бренд</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="brandForm">
          <input type="hidden" id="brand_id" name="brand_id" value="new" />
          <?= FH::displayErrors($this->displayErrors); ?>
          <?= FH::inputBlock('text', 'Имя бренда', 'name', $this->brand->name, ['class' => 'form-control'], ['class' => 'form-group']); ?>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="button" class="btn btn-primary" onclick="saveBrand()">Сохранить</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#brandForm').find("input[type=text], text").each(function(ev) {
      if (!$(this).val()) {
        $(this).attr("placeholder", "Введите наименование бренда...");
      }
    });
  });

  jQuery('#addBrandForm').on('hidden.bs.modal', function() {
    jQuery('#name').val('');
    jQuery('#brand_id').val('new');

  });

  function saveBrand() {
    let formData = jQuery('#brandForm').serialize();
    jQuery.ajax({
      url: '<?= PROOT ?>adminbrands/save',
      method: "POST",
      data: formData,
      success: function(resp) {
        if (resp.success) {
          jQuery('#addBrandForm').modal('hide');
          let row = jQuery('tr[data-id="' + resp.brand.id + '"]');
          let newRow = '<tr data-id="' + resp.brand.id + '"><td>' + resp.brand.id + '</td><td>' + resp.brand.name + '</td><td></td></tr>'
          if (row.length === 0) {
            jQuery('#brandsTable tbody').prepend(newRow);
          } else {
            jQuery('tr[data-id="' + resp.brand.id + '"] td:nth-child(2)').text(resp.brand.name)
          }
          alertMsg("Бренд сохранен",'success');
          console.log(row);
        }
      }
    });
  }
</script>