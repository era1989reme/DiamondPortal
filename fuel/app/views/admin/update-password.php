<div class="modal fade modal-password-admin" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Update Password</h4>
</div>
<div class="modal-body">
  <?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/settings/updatepassword'), 'method'=>'post')); ?>
<div class="form-group">
<label>New Password</label>
<input type="password" class="form-control" placeholder="" name="password">
</div>
<div class="form-group">
<button class="btn btn-success btn-action">Update</button>
<?php echo Form::close(); ?>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
