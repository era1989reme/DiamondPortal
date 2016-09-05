<h2>Viewing #<?php echo $lead->id; ?></h2>

<p>
	<strong>Ring type:</strong>
	<?php echo $lead->ring_type; ?></p>
<p>
	<strong>Budget:</strong>
	<?php echo $lead->budget; ?></p>
<p>
	<strong>Post code:</strong>
	<?php echo $lead->post_code; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $lead->email; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $lead->description; ?></p>

<?php echo Html::anchor('admin/leads/edit/'.$lead->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/leads', 'Back'); ?>
