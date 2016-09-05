<div class="row">
<div class="col-md-1"><h4>Lead #</h4></div>
<div class="col-md-2"><h4>Date Created</h4></div>
<div class="col-md-2"><h4>Ring Type</h4></div>
<div class="col-md-2"><h4>Budget</h4></div>
<div class="col-md-1"><h4>Post Code</h4></div>
<div class="col-md-4"></div>
</div>

<?php foreach($leads as $lead): ?>
<div class="row leadbox">
<div class="col-md-1"><?php echo $lead->id?></div>
<div class="col-md-2"><?php echo date('d/m/Y',$lead->created_at)?></div>
<div class="col-md-2"><?php echo $lead->rings?></div>
<div class="col-md-2"><?php echo $lead->budget?></div>
<div class="col-md-1"><?php echo $lead->postcode?></div>
<div class="col-md-4">
<?php if($lead->status==0): ?>
<button class="btn btn-success"  onclick="openApproveModal(this)" data-url="<?php echo Uri::create('admin/leads/status/'.$lead->id.'/'.($lead->status?0:1))?>">Approve</button>
<?php endif;?>

<?php //echo Html::anchor('admin/leads/status/'.$lead->id.'/'.($lead->status?0:1), ($lead->status?'Unapprove':'Approve'), array('class'=>'btn '.($lead->status?'btn-info':'btn-success'))); ?>
<?php echo Html::anchor('admin/leads/delete/'.$lead->id, 'Delete', array('onclick' => "return confirm('Are you sure?')",'class'=>'btn btn-danger')); ?>
</div>
<div class="col-md-12 extra-info">
<p>Email address: <?php echo $lead->email?></p>
<?php if($lead->otherinfo): ?>
<p id="content_<?php echo $lead->id?>" class="fixview"><?php echo $lead->otherinfo?></p>
<?php endif;?>
</div>
<?php if($lead->otherinfo): ?>
<div class="col-md-2 viewmore" id="more_<?php echo $lead->id?>">
<a href="javascript:void(0)" class="viewmore-btn" onclick="moreless(<?php echo $lead->id?>, 'less', 'more')">View More</a>
</div>
<div class="col-md-2 viewless hidden" id="less_<?php echo $lead->id?>">
<a href="javascript:void(0)" class="viewmore-btn" onclick="moreless(<?php echo $lead->id?>, 'more', 'less')">View Less</a>
</div>
<?php endif;?>
</div>
<?php endforeach;?>

<div class="col-md-12"><?php echo html_entity_decode($pagination)?></div>
