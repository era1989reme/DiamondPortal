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


						<div class="row leadbox">
							<div class="col-md-1"><?php echo $item['id'];?></div>
							<div class="col-md-2"><?php echo date('d/m/Y',$item['created_at']);?></div>
							<div class="col-md-2"><?php echo $item['rings'];?></div>
							<div class="col-md-2"><?php echo $item['budget'];?></div>
							<div class="col-md-2"><?php echo $item['postcode'];?></div>
							<div class="col-md-3">$<?php echo number_format($item['amount'],2);?></div>

							<?php foreach($quotes as $itemq): ?>
							<div class="leaddetails-b">
								<div class="col-md-2">Your Quote:</div>
								<div class="col-md-10"><?php echo $itemq['quote'];?></div>
							</div>

							<div class="leaddetails">
								<div class="col-md-2">Files:</div>
								<div class="col-md-10"><?php $files = json_decode($itemq['files']);
									foreach($files as $file){
										echo Html::anchor('files/quote/'.$file->saved_as, $file->name,['target'=>'_blank']);
										echo ', ';
									}
								?>
								</div>
							</div>
						<?php endforeach;?>
							<div class="leaddetails-b">
								<?php echo Form::open(array("class"=>"", 'action'=>Uri::create('index.php/jeweller/submitquote/'.$item['id']), 'method'=>'post', 'enctype'=>"multipart/form-data"))?>
								<h4>Your Follow up</h4>
								<div class="col-md-12">
									<textarea class="form-control quote-text" rows="5" name="quote"></textarea>
								</div>
								<div class="col-md-12">
									<div id="myIdForUpload" >Drop files here or click to upload.</div>
									<div id="progress" class="progress">
										<div class="progress-bar progress-bar-success"></div>
									</div>
									<input type="hidden" value="" name="files" id="files"> 
									<!--<input type="file" class="form-control input-box" name="files[]" multiple>-->
									<div id="uploadedfiles"></div>
								</div>
								<div class="col-md-12">
									<input type="hidden" name="type" value="followup" >
									<button class="quote-submit-btn">Submit Quote</button>
								</div>
								<?php echo Form::close(); ?>
							</div>
						</div>



					</div>
