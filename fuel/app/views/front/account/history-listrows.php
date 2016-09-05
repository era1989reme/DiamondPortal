<?php 
$rings = array( 
	'ring_1' => 'Solitaire Engagement Ring',
	'ring_2' => 'Halo Engagement Ring',
	'ring_3' => 'Sidestone Engagement Ring',
	'ring_4' => 'Trilogy Engagement Ring',
	'ring_5' => 'I\'d like a different Gemstone',
	'ring_6' => 'I\'m not sure - I need help',
);
?>
<?php $i = 0; foreach($list as $item): $i++; ?>
  <?php if($item['type']=='quote'):
      $value = json_decode($item['messge']);
    ?>

    <div class="row leadbox">
    <div class="col-md-1"><?php echo $value->leadid;?></div>
    <div class="col-md-2"><?php echo date('m/d/Y',$item['created_at'])?></div>
    <div class="col-md-2"><?php $ring = explode(',', $value->rings);
	$_r = array();
		foreach($ring as $r) $_r[] = $rings[$r];
	echo implode(',', $_r)?></div>
    <div class="col-md-2"><?php echo $value->budget;?></div>
    <div class="col-md-2"><?php echo $value->postcode;?></div>
    <div class="col-md-2">$<?php echo $value->amount;?></div>
    <div class="col-md-1">$<?php echo $item['balance']?></div>
    </div>
  <?php else: ?>

<div class="row leadbox history-<?php echo $i%2==0?'green':'skin'?>">
<div class="col-md-2"><?php echo $item['type']?></div>
<div class="col-md-2"><?php echo date('m/d/Y',$item['created_at'])?></div>
<div class="col-md-6"><?php echo $item['messge']?></div>
<div class="col-md-2 text-right">$<?php echo $item['balance']?></div>
</div>
  <?php endif;?>
<?php endforeach; ?>

<div class="col-md-12">
<?php echo $pagination;?>
</div>