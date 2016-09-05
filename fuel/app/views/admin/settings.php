<div class="row">
<div class="col-lg-12">
<h1>Admin Settings</h1>
<?php $fields = array();
foreach($values as $r){ 
$fields[$r['key']] = $r['value'];
}
 ?>
<?php echo Form::open(array("class"=>"form-horizontal", 'action'=>Uri::create('admin/settings'),'id'=>'settings_form', 'method'=>'post')); ?>	
	<div class="form-group">
      <label class="control-label col-sm-4" for="lead_valid_days">No. of days for getting quotes on a lead</label>
      <div class="col-sm-2">
        <input type="number" class="form-control" id="lead_valid_days" placeholder="No. of days" min="0" required name="fields[lead_valid_days]" value="<?php echo isset($fields['lead_valid_days']) ? $fields['lead_valid_days'] : '0'?>">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4" for="allowed_jewellers">No. of jewellers allowed to quote</label>
      <div class="col-sm-2">
        <input type="number" class="form-control" id="allowed_jewellers" placeholder="Allowed Jewellers" min="0" required name="fields[allowed_jewellers]" value="<?php echo isset($fields['allowed_jewellers']) ? $fields['allowed_jewellers'] : '0'?>">
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4" for="lead_become_old">No. of days for a lead to become old lead</label>
      <div class="col-sm-2">
        <input type="number" class="form-control" id="lead_become_old" placeholder="Lead Become old" min="0" required name="fields[lead_become_old]" value="<?php echo isset($fields['lead_become_old']) ? $fields['lead_become_old'] : '0'?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-5">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
<?php echo Form::close(); ?>	
</div>
</div>
