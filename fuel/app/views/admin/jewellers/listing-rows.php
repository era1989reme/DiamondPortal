<table class="table table-bordered table-striped">
<thead>
<tr>
<th></th>
<th>Jeweller #</th>
<th>Jeweller Name</th>
<th class="hidden-xs">Date Created</th>
<th style="text-align: center;"><i class="fa fa-credit-card table-icon"></i></th>
<th class="hidden-xs" style="text-align: center;"><i class="fa fa-envelope table-icon"></i></th>
<th class="hidden-xs" style="text-align: center;"><i class="fa fa-eye table-icon"></i></th>
</tr>
</thead>
<tbody id="" >
<?php foreach($jewellers as $jeweller) : ?>
<tr>
<td align="center"><input type="checkbox" name="jeweller[<?php echo $jeweller->id;?>]" value="<?php echo $jeweller->id;?>" class="select_jeweller"></td>
<td><?php echo $jeweller->id;?></td>
<td><?php echo $jeweller->name;?></td>
<td class="hidden-xs"><?php echo date('d/m/Y', $jeweller->created_at);?></td>
<td align="center">$<?php echo $jeweller->credit;?></td>
<td class="hidden-xs" align="center"><?php echo $jeweller->email;?></td>
<td class="hidden-xs" align="center"><a href="<?php echo Uri::create('admin/jewellers/activites/'.$jeweller->id);?>">Activity</a></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<div class="col-md-12"><?php echo html_entity_decode($pagination)?></div>
