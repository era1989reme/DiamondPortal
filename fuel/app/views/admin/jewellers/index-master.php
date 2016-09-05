<h2>Listing Leads</h2>
<br>
<?php if ($leads): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Ring type</th>
			<th>Budget</th>
			<th>Post code</th>
			<th>Email</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($leads as $item): ?>		<tr>

			<td><?php echo $item->ring_type; ?></td>
			<td><?php echo $item->budget; ?></td>
			<td><?php echo $item->post_code; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->description; ?></td>
			<td>
				<?php echo Html::anchor('admin/leads/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/leads/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/leads/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Leads.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/leads/create', 'Add new Lead', array('class' => 'btn btn-success')); ?>

</p>
