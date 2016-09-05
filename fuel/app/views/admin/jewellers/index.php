<div class="row">
<div class="col-lg-12">
<div class="panel-default">
<div class="panel-body">
<div class="col-md-8 col-md-offset-2">
<h3>Search Jewellers</h3>
<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('admin/jewellers/listing'), 'onsubmit'=>'return sort_listing(this)', 'id'=>'sort_listing_form')); ?>
<div class="input-group">
<input type="text" id="example-input1-group2" name="search"
class="form-control input-lg search-user" placeholder="Search By Jeweller number or Jeweller Name" onkeyup="$('#listing_page').val(1);  $('#sort_listing_form').submit()">
<span class="input-group-btn">
<a href="#" class="btn-lg btn btn-success btn-search" onlclick="$('#listing_page').val(1); $('#sort_listing_form').submit()"><i class="fa fa-search"></i></a>
</span>
</div>
<input type="hidden" value="1" name="p" id="listing_page">
<?php echo Form::close(); ?>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<button class="action-btn" onclick="return openJwelModal('.modal-plus');"><i class="fa fa-plus"></i> Add Credit</button>
<button class="action-btn" onclick="return openJwelModal('.modal-minus');"><i class="fa fa-minus"></i> Remove Credit</button>
<button class="action-btn" onclick="return openJwelModal('.modal-email');"><i class="fa fa-envelope"></i> Update Email</button>
<button class="action-btn" onclick="return openJwelModal('.modal-password');"><i class="fa fa-cog"></i> Change Password</button>
<button class="action-btn" onclick="return openJwelModal('.modal-postcode');"><i class="fa fa-plus"></i> Add Postcode</button>
</div>
</div>


<div class="row">
<div class="col-lg-12">
<div class="panel panel-default panel-fill" id="sort_listing"></div>
</div>
</div>



<?php echo render('admin/jewellers/add-credit'); ?>
<?php echo render('admin/jewellers/remove-credit'); ?>
<?php echo render('admin/jewellers/update-email'); ?>
<?php echo render('admin/jewellers/update-password'); ?>
<?php echo render('admin/jewellers/add-postcode'); ?>

