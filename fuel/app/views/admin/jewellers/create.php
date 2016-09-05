<div class="modal fade modal-add-jeweller" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Add New Jeweller</h4>
</div>
<div class="modal-body">
<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/jewellers/create'), 'onsubmit'=>'return createJewllwer(this)')); ?>
<div class="form-group">
<label>Jeweller Name</label>
<input type="text" class="form-control" placeholder="Enter Name" name="name">
</div>
<div class="form-group">
<label>Jeweller Username</label>
<input type="text" class="form-control" placeholder="Enter username" name="username">
</div>
<div class="form-group">
<label>Email Address</label>
<input type="text" class="form-control" placeholder="Enter email" name="email">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" placeholder="Enter password" name="password">
</div><div class="form-group"><label>Website</label><input type="text" class="form-control" placeholder="Enter website" name="website"></div><div class="form-group"><label>Phone #</label><input type="text" class="form-control" placeholder="Enter phone #" name="phone"></div><div class="form-group"><label>Address</label><textarea class="form-control" placeholder="Enter address" name="address"></textarea></div>
<div class="form-group">
<button class="btn btn-success btn-action">Add Jeweller</button>
</div>
<?php echo Form::close(); ?>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
