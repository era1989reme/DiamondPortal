			<div class="row text-center">
					<div class="col-md-8 col-md-offset-2 quotebox">
						<h4 class="subtitle">You have received a quote from <?php echo $jeweller['name'];?></h4>
						<h3 class="title">via DiamondFind</h3>
						<p>
						<?php echo $quote['quote'];?>
						</p>

						<div class="imgbox">
							<?php $files = json_decode($quote['files']);
							if($files && count($files) > 0) {
							foreach($files as $file){
								list($name, $ext) = explode('.', $file->saved_as);
								if(in_array($ext, array('jpg','jpeg', 'gif', 'png', 'bmp'))) {  ?>
									<img class="quoteimg" src="<?php echo Uri::create('files/quote/').$file->saved_as;?>" />	
								<?php } else {
									echo Html::anchor('files/quote/'.$file->saved_as, $file->name,['target'=>'_blank']);
								}
							}
							}
							?>
							
						</div>

						<h4 class="subheading">What do I do next?</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
						</p>

						<div class="row quote-footer">
							<div class="col-md-6">
								<h4><?php echo $jeweller['name'];?></h4>
								<p><?php echo $jeweller['address'];?></p>
								<p><?php echo $jeweller['phone'];?></p>
								<p><a href="mailto:<?php echo $jeweller['email'];?>"><?php echo $jeweller['email'];?></a></p>
								<p><a href="<?php echo $jeweller['website'];?>" target="_blank"><?php echo $jeweller['website'];?></a></p>
							</div>
							<div class="col-md-6 respond-btn-box">
								<!--<a href="#" class="quote-respond-btn">Respond to Quote</a>-->
							</div>
						</div>
					</div>
				</div>
	<?php  /*			
<div class="col-md-12">
	<h2>Your Request</h2>
	<table class="table bordered">
		<tr><th>rings</th><td><?php echo $lead['rings']?></td></tr>
		<tr><th>budget</th><td><?php echo $lead['budget']?></td></tr>
		<tr><th>ringsize</th><td><?php echo $lead['ringsize']?></td></tr>
		<tr><th>ringshape</th><td><?php echo $lead['ringshape']?></td></tr>
		<tr><th>postcode</th><td><?php echo $lead['postcode']?></td></tr>
		<tr><th>otherinfo</th><td><?php echo $lead['otherinfo']?></td></tr>
	</table>
	
	
	<h3>Jeweller Quote</h3>
	<p><?php echo $quote['quote'];?></p>
<p class="col-md-10"><?php $files = json_decode($quote['files']);
$f = array(); 
foreach($files as $file){
$f[] = Html::anchor('files/quote/'.$file->saved_as, $file->name,['target'=>'_blank']);
}
echo implode(',', $f);?>
<span class="help-block">Given By: </span> <i><?php echo $jeweller['name'];?></p>
</p>
</div>
*/?>
