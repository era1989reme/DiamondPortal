<div class="col-md-9">
<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('account/historylist'), 'onsubmit'=>'return sort_listing(this)', 'id'=>'sort_listing_form')); ?>
<input type="hidden" value="1" name="p" id="listing_page">
<?php echo Form::close(); ?>
<div class="row leadbox-header">
<div class="col-md-2">
<h4>Lead #</h4>
</div>
<div class="col-md-2">
<h4>Date Created</h4>
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
</div>
<div class="col-md-2">
</div>
<div class="col-md-1">
</div>
<div class="col-md-1">
<h4>Balance</h4>
</div>
</div>

<div id="sort_listing"></div>

</div>
