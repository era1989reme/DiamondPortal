<div class="modal fade modal-email" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Edit Email</h4>
</div>
<div class="modal-body">
  <?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/jewellers/update'), 'onsubmit'=>'return createJewllwer(this)')); ?>
<div class="form-group">
<label>New Email</label>
<input type="email" class="form-control" placeholder="email@example.com" name="email">
</div>
<div class="form-group">
<button class="btn btn-success btn-action">Update</button>
<input name="jewellers" type="hidden" value="" class="jewellers" >
<input name="option" type="hidden" value="email">
<?php echo Form::close(); ?>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
