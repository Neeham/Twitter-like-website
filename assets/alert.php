<?php
function alert($type, $msg){
if ($type == "error") { ?>
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
  <div class="modal" tabindex="-1" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <?php if ($type == "error") { ?>
          <h4 class="modal-title"><?php echo _("Error")?></h4>
          <?php } else if ($type == "success") {?>
		  			<h4 class="modal-title"><?php echo _("Success")?></h4>
          <?php } ?>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
        </div>
        <div class="modal-body">
          <p><?php echo $msg ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo _("Close")?></button>
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