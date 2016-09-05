<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title; ?></title>

        <?php echo Asset::css([
          'front/bootstrap.min.css',
          'front/core.css',
          'front/icons.css',
          'front/components.css',
          'front/pages.css',
          'front/menu.css',
          'front/responsive.css',
          'front/custom.css',
          ]); ?>
			<link rel="stylesheet" type="text/css" href="//cloud.typography.com/6163314/7557552/css/fonts.css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <?php echo Html::anchor('http://www.diamondfind.com.au/', Html::img('assets/images/logo.png'), ['class'=>'logo']) ?>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

						<div id="navigation">
                        <!-- Navigation Menu-->
                       <?php echo render('front/top-navs'); ?>
                        <!-- End navigation menu  -->
                    </div>
                    <?php if ($current_user): ?>
                        <ul class="nav navbar-nav navbar-right pull-right">
                           <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle profile " data-toggle="dropdown" aria-expanded="true">
                                  <?php echo Html::img('assets/images/users/avatar.png', array('alt'=>"user-img", 'class'=>"img-circle user-img")) ?>
									<i icon="md md-lock"></i>
                                </a>
                                
                                

                                <ul class="dropdown-menu">
                                    <li><?php echo Html::anchor('account/setting', '<i class="md md-settings"></i> Settings') ?></li>
                                    <li><?php echo Html::anchor('javascript:void(0)', '<i class="md md-settings"></i> Change Password', array('onclick'=>"return updatePassword()")) ?></li>                                    
                                    <li>  <?php echo Html::anchor('jeweller/logout', '<i class="md md-settings-power"></i> Logout') ?></li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif;?>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">

                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">
              <?php if (Session::get_flash('success')): ?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                        <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
                        </p>
                      </div>
              <?php endif; ?>
              <?php if (Session::get_flash('error')): ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>
                        <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
                        </p>
                      </div>
              <?php endif; ?>

			           <?php if ($current_user): ?>
              <div class="row tab_menu" style="border-bottom: none; box-shadow: none;">
              <div class="col-md-12" style="padding: 0; margin: 0;">
              <h3>Hello, <?php echo Session::get('name')?></h3>
              </div>
              </div>


              				<div class="row">

              					<div class="col-md-3">
              						<h4>Leads</h4>
              						<ul class="sidebar-links">
              							<li <?php echo $menu=='newleads'?'class="active"':''?>><?php echo Html::anchor('jeweller', 'New Leads') ?></li>
              							<li <?php echo $menu=='activeleads'?'class="active"':''?>><?php echo Html::anchor('jeweller/activeleads', 'Active Leads') ?></li>
              							<li <?php echo $menu=='oldleads'?'class="active"':''?>><?php echo Html::anchor('jeweller/oldleads', 'Old Leads') ?></li>
              						</ul>

              						<h4>Account</h4>
              						<ul class="sidebar-links">
              							<li <?php echo $menu=='history'?'class="active"':''?>><?php echo Html::anchor('account/history', 'Account History') ?></li>
              							<li <?php echo $menu=='setting'?'class="active"':''?>><?php echo Html::anchor('account/setting', 'Account Settings') ?></li>
              						</ul>
              					</div>
								<?php endif;?>
              <?php echo $content; ?>

            </div>
                <?php echo render('front/footer'); ?>

            </div>
            <!-- end container -->


        </div>

        <?php echo Asset::js(array(
      		'front/jquery.min.js',
      		'front/bootstrap.min.js',
      		'front/jquery.app.js',
      		  'dropzone.js'
      	)); ?>
      	<script type="text/javascript">
          if($('#myIdForUpload').length) {
			  var files  = new Array();
          $("div#myIdForUpload").dropzone({ url: "<?php echo Uri::create('jeweller/fileupload');?>",
            'acceptedFiles': 'image/*,application/pdf',
			previewTemplate:'<i class="hidden preview-image"></i>',
			uploadprogress : function(file,progress, bytesent) { 
				$('#progress .progress-bar').css(
						'width',
						progress + '%'
				);
			},

            success: function(file,data) {
          		  //console.log(data);
				  data = $.parseJSON(data);
				  if(data.extension=='jpg' || data.extension=='jpeg' || data.extension=='png' || data.extension=='gif' || data.extension=='bmp')
				  {
					var img = $('<img />', {
					  src: "<?php echo Uri::create('files/quote/');?>"+data.saved_as,
					  alt: data.name,
					  width:100,
					  height:100
					});
					
					} else { 
						var img = $('<div />', {
						  title: data.name,
						});
						img.html(data.name);
					}
					img.appendTo($('#uploadedfiles'));
					files[files.length] = data;
				  //console.log(files);
				  $('#files').val(JSON.stringify(files));
          		}
        
          });
          }
          
          function updatePassword()
          { 
          		$('.modal-password').modal('show');
          }
$(function(){ 
	if($('#sort_listing_form').length) {
			$('#sort_listing_form').submit(); 
	}
});

function sort_listing(f)
{
  var listing = $(f);
  if(listing.length) {
    $.get(listing.attr('action'),listing.serialize(), function(response){
          $('#sort_listing').html(response);
    });
  }
  return false;
}


function setPageFilter(page)
{
  if(page=='<'){
    page = parseInt($('#listing_page').val())-1;
  }

  if(page=='>'){
    page = parseInt($('#listing_page').val())+1;
  }
  if(page<=0) page = 1;
  $('#listing_page').val(page);
  $('#sort_listing_form').submit();
}
        </script>
<?php echo render('front/jeweller/update-password'); ?>
    </body>
</html>
