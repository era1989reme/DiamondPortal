

					<div class="col-md-9">

						<div class="row leadbox-header">
							<div class="col-md-1">
								<h4>Lead #</h4>
							</div>
							<div class="col-md-2">
								<h4>Date Created</h4>
							</div>
							<div class="col-md-2">
								<h4>Ring Type</h4>
							</div>
							<div class="col-md-2">
								<h4>Budget Range</h4>
							</div>
							<div class="col-md-2">
								<h4>Post Code</h4>
							</div>
							<div class="col-md-2">
								<h4>Lead Cost</h4>
							</div>
							<div class="col-md-1"></div>
						</div>


						<?php foreach($list as $row): ?>
						<div class="row leadbox">
							<div class="col-md-1"><?php echo $row['id'];?></div>
							<div class="col-md-2"><?php echo date('d/m/Y',$row['created_at']);?></div>
							<div class="col-md-2"><?php echo $row['rings'];?></div>
							<div class="col-md-2"><?php echo $row['budget'];?></div>
							<div class="col-md-2"><?php echo $row['postcode'];?></div>
							<div class="col-md-2">$<?php echo $row['amount'];?></div>
							<div class="col-md-1">
								<?php echo Html::anchor('jeweller/leadfollowup/'.$row['id'], 'Follow Up',['class'=>'btn btn-green']) ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
