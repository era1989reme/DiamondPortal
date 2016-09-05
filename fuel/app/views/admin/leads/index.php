<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/leads/listing'), 'onsubmit'=>'return sort_listing(this)', 'id'=>'sort_listing_form')); ?>
<input type="hidden" value="1" name="p" id="listing_page">
<?php echo Form::close(); ?>

<div class="row">
<div class="col-lg-12">
<div class="" id="sort_listing" ></div>
</div>
</div>
<?php echo render('admin/leads/approveamount'); ?>
