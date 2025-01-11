<?php

use Core\Session;

 $this->start('body'); ?>
<h1 class="text-center my-3">Просмотр товаров</h1>
<table class="table table-bordered table-hover table-stripped table-responsive">
    <thead>
        <th class="text-center">ID</th>
        <th class="text-center">Название</th>
        <th class="text-center">Цена, руб</th>
        <th class="text-center">Емкость, мл/мг</th>
        <th class="text-center">Краткое описание</th>
        <th class="text-center">Тип кожи</th>
        <th class="text-center">Назначение</th>
        <th class="text-center">Действия</th>
    </thead>
    <tbody>
        <?php foreach ($this->products as $product): ?>
            <tr data-id="<?= $product->id ?>">
                <td class="text-center"><?= $product->id ?></td>
                <td class="text-center"><?= $product->title ?></td>
                <td class="text-center"><?= $product->price ?></td>
                <td class="text-center"><?= $product->capacity ?></td>
                <td class="text-center"><?= $product->sub_desc ?></td>
                <td class="text-center"><?= $product->skin ?></td>
                <td class="text-center"><?= $product->purpose ?></td>
                <td class="d-flex justify-content-center column-gap-4">
                    <a class="btn btn-sm d-flex align-items-center feature-btn <?= ($product->featured == 1) ? 'btn-primary' : 'btn-secondary' ?>" data-id="<?= $product->id ?>">Акция</a>

                    <a class="btn btn-warning" href="<?= PROOT ?>admincatalog/edit/<?= $product->id ?>"><i>Редактировать</i></a>
                    <a class="btn btn-danger" href="#" onclick="deleteProduct('<?=$product->id?>');return false;"><i>Удалить</i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
  function deleteProduct(id){
    if(window.confirm("Удалить товар?")){
      jQuery.ajax({
        url : '<?=PROOT?>admincatalog/delete',
        method : "POST",
        data : {id : id},
        success: function(resp){
          let msgType = (resp.success)? 'success' : 'danger';
          if(resp.success){
            jQuery('tr[data-id="'+resp.model_id+'"]').remove();
          }
        }
      });
    }
  }
    $(document).ready(function() {
        $('.feature-btn').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            toggleFeatured(id);
        });

        function toggleFeatured(id) {
            $.ajax({
                url: '<?= PROOT ?>admincatalog/toggleFeatured',
                method: "POST",
                data: {
                    id: id
                },
                success: function(resp) {
                    if (resp.success) {
                        updateFeatured(id, resp.featured);
                    }
                }
            });
        }

        function updateFeatured(id, featured) {
            let el = $('.feature-btn[data-id="' + id + '"]');
            let color = featured ? 'btn-primary' : 'btn-secondary';
            el.removeClass("btn-primary btn-secondary").addClass(color);
        }

        // Обновляем статус для всех продуктов при загрузке страницы
        function updateAllFeatured() {
            $('.feature-btn').each(function() {
                let id = $(this).data('id');
                $.ajax({
                    url: '<?= PROOT ?>admincatalog/getFeaturedStatus',
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(resp) {
                        if (resp.success) {
                            updateFeatured(id, resp.featured);
                        }
                    }
                });
            });
        }
        $(updateAllFeatured);
    });
    
</script>
<?php $this->end(); ?>