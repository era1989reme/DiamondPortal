
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

<?php $i = 0; foreach($list as $item): $i++; ?>
  <?php if($item['type']=='quote'): 
  
      $value = json_decode(html_entity_decode($item['messge'])); 
 
    ?>

    <div class="row leadbox">
    <div class="col-md-1"><?php echo $value->leadid;?></div>
    <div class="col-md-2"><?php echo date('m/d/Y',$item['created_at'])?></div>
    <div class="col-md-2"><?php echo $value->rings;?></div>
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

<div class="col-md-12"><?php echo html_entity_decode($pagination)?></div>

