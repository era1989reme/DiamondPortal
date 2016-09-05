<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Ring type', 'ring_type', array('class'=>'control-label')); ?>

				<?php echo Form::input('ring_type', Input::post('ring_type', isset($lead) ? $lead->ring_type : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Ring type')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Budget', 'budget', array('class'=>'control-label')); ?>

				<?php echo Form::input('budget', Input::post('budget', isset($lead) ? $lead->budget : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Budget')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Post code', 'post_code', array('class'=>'control-label')); ?>

				<?php echo Form::input('post_code', Input::post('post_code', isset($lead) ? $lead->post_code : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Post code')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Email', 'email', array('class'=>'control-label')); ?>

				<?php echo Form::input('email', Input::post('email', isset($lead) ? $lead->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Email')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('description', Input::post('description', isset($lead) ? $lead->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
