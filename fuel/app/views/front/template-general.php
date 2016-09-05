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

				<div class="row">
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



      	)); ?>



    </body>

</html>

