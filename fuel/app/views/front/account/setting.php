<div class="col-md-9">
<div class="row">
	<h1>Your Info</h1>
<div class="col-md-12">
	<div class="col-md-9">
	<table class="table borderd">
		<tr>
		<th>Name</th><td><span class="jeweller-name pull-left"><?php echo $user['name'];?></span>
			<input type="text" name="name" id="jeweller-name" value="<?php echo $user['name'];?>" class="form-control hidden pull-left" style="width: 80%;  border: 1px solid #dfdfdf; margin-right: 6px;">
		<a class="edit-name pull-left" onClick="editName('name');" href="javascript:void(0);">&nbsp;&nbsp; Edit</a>
		<a class="help-block save-name hidden pull-left btn btn-success" onClick="saveName('name');" href="javascript:void(0);">Save</a>
		</td></tr>
		<tr><th>Username</th><td><?php echo $user['username'];?></td></tr>
		<tr><th>Email</th><td><?php echo $user['email'];?></td></tr>
		<tr><th>Credit</th><td>$<?php echo number_format($user['credit']);?></td></tr>
		<tr>
		<th>Phone</th><td><span class="jeweller-phone pull-left"><?php echo $user['phone'];?></span>
			<input type="text" name="name" id="jeweller-phone" value="<?php echo $user['phone'];?>" class="form-control hidden pull-left" style="width: 80%;  border: 1px solid #dfdfdf; margin-right: 6px;">
		<a class="edit-phone pull-left" onClick="editName('phone');" href="javascript:void(0);">&nbsp;&nbsp; Edit</a>
		<a class="help-block save-phone hidden pull-left btn btn-success" onClick="saveName('phone');" href="javascript:void(0);">Save</a>
		</td></tr>
		<tr><th>Website</th><td><span class="jeweller-website pull-left"><?php echo $user['website'];?></span>
			<input type="text" name="name" id="jeweller-website" value="<?php echo $user['website'];?>" class="form-control hidden pull-left" style="width: 80%;  border: 1px solid #dfdfdf; margin-right: 6px;">
		<a class="edit-website pull-left" onClick="editName('website');" href="javascript:void(0);">&nbsp;&nbsp; Edit</a>
		<a class="help-block save-website hidden pull-left btn btn-success" onClick="saveName('website');" href="javascript:void(0);">Save</a>
		</td></tr>
	</table>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	function editName(obj)
	{ 
		$('.jeweller-'+obj).addClass('hidden');
		$('a.edit-'+obj).addClass('hidden');
		$('#jeweller-'+obj).removeClass('hidden');
		$('a.save-'+obj).removeClass('hidden');
	}
	
	function saveName(obj)
	{ 
		$.post('<?php echo Uri::create('account/savename')?>', {value:$('#jeweller-'+obj).val(), field :obj}, function(){ 
			//window.location.reload();
			$('.jeweller-'+obj).removeClass('hidden').text($('#jeweller-'+obj).val());
			$('a.edit-'+obj).removeClass('hidden');
			$('#jeweller-'+obj).addClass('hidden');
			$('a.save-'+obj).addClass('hidden');
		});
	}
</script>
