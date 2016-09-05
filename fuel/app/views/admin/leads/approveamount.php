<div class="modal fade approve-amount" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Approve</h4>
</div>
<div class="modal-body">
<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/leads/approve'), 'onsubmit'=>'return createJewllwer(this)', 'method'=>'post')); ?>
<div class="form-group">
<label>Amount</label>
<input type="number" class="form-control" placeholder="e.g. 1000" min="0" name="amount">
</div>
<div class="form-group">
<button class="btn btn-success btn-action">Submit</button>
<?php echo Form::close(); ?>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
