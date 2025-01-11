<style>

  .sortable-placeholder{
    background-color: #eee;
  }

  .deleteButton:hover{
    color: #aa0000;
  }
</style>
<div id="sortableImages" class="d-flex align-items-center justify-content-start flex-grow-0 container-fluid">
    <?php foreach($this->images as $image):?>
      <div class="col-md-4 mx-2 flex-grow-0" style="width: 125px; height:125px; position: relative;" id="image_<?=$image->id?>">
        <span class="deleteButton" style="position: absolute; cursor: pointer; font-size: 12px; margin: 0 3.5em;"  onclick="deleteImage('<?=$image->id?>')">Удалить</span>
        <div class="col shadow rounded bg-secondary-subtle d-flex justify-content-center" style="height:125px;" data-id="$image->id">
          <img class="rounded" src="<?=PROOT.$image->url?>" />
        </div>
      </div>
    <?php endforeach;?>
</div>

<script>

  function updateSort(){
    var sortedIDs = $( "#sortableImages" ).sortable( "toArray" );
    $('#images_sorted').val(JSON.stringify(sortedIDs));
  }

  function deleteImage(image_id){
    if(confirm("Удалить картинку?")){
      jQuery.ajax({
        url : '<?=PROOT?>admincatalog/deleteImage',
        method : "POST",
        data : {image_id : image_id},
        success: function(resp){
          if(resp.success){
            jQuery('#image_'+resp.model_id).remove();
            updateSort();
          }
        }
      });
      console.log(image_id);
    }
  }

  jQuery('document').ready(function(){
    jQuery( "#sortableImages" ).sortable({
      axis: "x",
      placeholder: "sortable-placeholder",
      update: function( event, ui ) {
        updateSort();
      }
    });
    updateSort();

  });
</script>
