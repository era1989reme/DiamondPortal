<div class="modal fade modal-minus" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Remove Credit</h4>
</div>
<div class="modal-body">
  <?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/jewellers/addcredit'), 'onsubmit'=>'return createJewllwer(this)')); ?>
<div class="form-group">
<label>Credit Amount</label>
<input type="number" class="form-control" placeholder="e.g. 1000" min="0" name="credit">
</div>
<div class="form-group">
<label>Invoice Narrative</label>
<input type="text" class="form-control" placeholder="e.g. Funds for diamond ring" name="narrative">
</div>
<div class="form-group">
<button class="btn btn-success btn-action">Remove</button>
<input name="jewellers" type="hidden" value="" class="jewellers" >
<input name="option" type="hidden" value="-">
<?php echo Form::close(); ?>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
