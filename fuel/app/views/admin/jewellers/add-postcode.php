<div class="modal fade modal-postcode" tabindex="-1" role="dialog" aria-hidden="true" style="display: none" data-url="<?php echo Uri::create('admin/jewellers/getpostcode')?>">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4 class="modal-title">Add Postcode</h4>
</div>
<div class="modal-body">
  <?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/jewellers/addpostcode'), 'onsubmit'=>'return createJewllwer(this)')); ?>
<div class="form-group">
<label>Postcode</label>
<input type="text" class="form-control postcode" placeholder="e.g. 12345" name="postcode" data-role="tagsinput"  >
</div>
<div class="form-group">
<button class="btn btn-success btn-action">Add</button>
<input name="jewellers" type="hidden" value="" class="jewellers" >
<input name="option" type="hidden" value="+">
<?php echo Form::close(); ?>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
