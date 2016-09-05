<h2>Editing Lead</h2>
<br>

<?php echo render('admin/leads/_form'); ?>
<p>
	<?php echo Html::anchor('admin/leads/view/'.$lead->id, 'View'); ?> |
	<?php echo Html::anchor('admin/leads', 'Back'); ?></p>
