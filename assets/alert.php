<?php
	  function alert($type, $msg){
	  if ($type == "error") { ?>
      <style>
.modal-header {
background-color: #FF0000;
}
</style>

<?php }

else if ($type == "errorNameExists") { ?>
	<style>
.modal-header {
background-color: #FF0000;
}
</style>

<?php }

else if ($type == "success") {?>
      <style>
.modal-header {
background-color: #00CF37;
}
<?php } ?>
</style>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <?php if ($type == "error") { ?>
          <h4 class="modal-title"><?php echo _("Error")?></h4>
          <?php } else if ($type == "success") {?>
		  <h4 class="modal-title"><?php echo _("Success")?></h4>
          <?php } ?>
        </div>
        <div class="modal-body">
          <p><?php echo $msg ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _("Close")?></button>
        </div>
      </div>

    </div>
  </div>
  <script type=text/javascript>
$('#myModal').modal('show');
</script>
 <?php
  }
  ?>
