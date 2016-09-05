<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title; ?></title>
        <?php echo Asset::css([
          'bootstrap.min.css', 'core.css', 'icons.css', 'pages.css', 'menu.css', 'responsive.css', 'custom.css',
          'bootstrap-tagsinput.css'
          ]); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    </head>
<body>

	<?php if ($current_user): ?>
    <header id="topnav">
        <div class="topbar-main">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                  <?php echo Html::anchor('admin', Html::img('assets/images/logo.png'), ['class'=>'logo']) ?>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras">

                    <ul class="nav navbar-nav navbar-right pull-right">
                       <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle profile " data-toggle="dropdown" aria-expanded="true">
                              <?php echo Html::img('assets/images/users/avatar.png', array('alt'=>"user-img", 'class'=>"img-circle user-img")) ?>
              <i icon="md md-lock"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><?php echo Html::anchor('admin/settings', '<i class="md md-settings"></i> Settings') ?>								</li>
								 <li><?php echo Html::anchor('javascript:void(0)', '<i class="md md-settings"></i> Change Password', array('onclick'=>"return 		$('.modal-password-admin').modal('show');")) ?></li>   
                                <li><?php echo Html::anchor('admin/logout', '<i class="md md-settings-power"></i> Logout') ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="navbar-custom">
            <div class="container">

            </div>
        </div>
    </header>

	<?php endif; ?>

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
  				<div class="row tab_menu">
  					<div class="col-md-12" style="padding: 0; margin: 0;">
              <?php echo Html::anchor('admin', 'Lead Queue', array('class'=>'tab_link '.(Uri::segment(2)==''?'active':'')));?>
              <?php if(Session::get('usergroup')==='100') : ?>
  						<?php echo Html::anchor('admin/jewellers', 'All Jewellers', array('class'=>'tab_link '.(Uri::segment(2)=='jewellers'?'active':'')));?>
  						<a href="#" data-toggle="modal" data-target=".modal-add-jeweller" class="tab_link">Add New Jeweller</a>
            <?php endif;?>
  					</div>
  				</div>


<?php echo $content; ?>

<?php echo render('admin/jewellers/create'); ?>
                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                Copyright &copy; 2016, DiamondFind.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="index.html#">Visit Website</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                  <!-- End Footer -->

              </div>
              <!-- end container -->


          </div>
<?php echo render('admin/update-password'); ?>		  
  <?php echo Asset::js(array(
		'jquery.min.js',
		'bootstrap.min.js',
		'jquery.app.js',
    'vrd.js',
    'bootstrap-tagsinput.min.js'
	)); ?>
	
	
    
          
          
    </body>
</html>
