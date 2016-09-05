<?php 
$rings = array( 
	'ring_1' => 'Solitaire Engagement Ring',
	'ring_2' => 'Halo Engagement Ring',
	'ring_3' => 'Sidestone Engagement Ring',
	'ring_4' => 'Trilogy Engagement Ring',
	'ring_5' => 'I\'d like a different Gemstone',
	'ring_6' => 'I\'m not sure - I need help',
	'ring_7' => 'Other',
);
?>
<?php foreach($list as $row): ?>
<div class="row leadbox">
<div class="col-md-1"><?php echo $row['id'];?></div>
<div class="col-md-2"><?php echo date('d/m/Y',$row['created_at']);?></div>
<div class="col-md-2"><?php $ring = explode(',', $row['rings']);
	$_r = array();
		foreach($ring as $r) { 
			if(empty($r)) continue;
			$_r[] = $rings[$r];
		}
		
	echo implode(',', $_r)?></div>
<div class="col-md-2"><?php echo $row['budget'];?></div>
<div class="col-md-2"><?php echo $row['postcode'];?></div>
<div class="col-md-2">$<?php echo $row['amount'];?></div>
<div class="col-md-1">

</div>
</div>
<?php endforeach; ?>
<div class="col-md-12">
<?php echo $pagination;?>
</div>