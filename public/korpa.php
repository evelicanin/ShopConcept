<!-- konekcija na bazu i funkcije -->
<?php require_once("../assets/database/config.php"); ?>      

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Shopping Cart Concept</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/nestable/nestable.css?1423393667" />
		<!-- END STYLESHEETS -->
		
		<link rel="stylesheet" href="../assets/css/angular-csp.css">                    <!-- Angular notifications CSS -->
		<link rel="stylesheet" href="../assets/css/angular-ui-notification.css">        <!-- Angular notifications CSS -->
		<link rel="stylesheet" href="../assets/css/animations.css">                     <!-- Animations-->
		<link rel="stylesheet" href="../assets/css/ng-animations.css">                  <!-- Angular-elements Animations-->
		<link rel="stylesheet" href="../assets/css/product_grid.css">                   <!-- product grid -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar header-fixed " ng-app="myApp" ng-controller="cartCtrl">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="index.html">
									<span class="text-lg text-bold text-primary"> SHOP</span>
								</a>
							</div>
						</li>	
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>											
					</ul>
				</div>
				
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">
		
			<!-- BEGIN CONTENT-->
			<div id="content">

				<!-- BEGIN SEARCH SECTION -->
				<section>
					<div class="section-body contain-sm">

								<div class="card style-default-bright">
									<div class="card-head">
									    <header>
											<div class="input-group">
												<input type="search" class="form-control" placeholder="You're searching for..." ng-model="cartFilter" >
												<span class="input-group-addon"><i class="fa fa-search"></i></span>
											</div>									
										</header>
									</div>
								</div>

					</div><!--end .section-body -->
				</section>
				<!-- END SEARCH SECTION -->
				</br>
				<!-- BEGIN BLANK SECTION -->
				<section class="grid-wrap">		
				
					<h1 class="text-info">							
						<i class="fa fa-shopping-cart fa-fw text-info"> </i>							
						Korpa
					</h1>
				
					<div class="section-body">																						
							<div class="card">
								<div class="card-body no-padding">																
									<ul class="list divider-full-bleed">							
										 <li ng-repeat="cartproduct in cartproducts | filter:cartFilter" class="tile scale-fade" >
											<a class="tile-content ink-reaction">
												<div class="tile-text">{{cartproduct.ID}} {{cartproduct.NAZIV}} </div>
											</a>
											<a href="#" class="btn btn-flat ink-reaction" data-toggle="modal" data-target="#formModal">
												<i class="md md-edit"></i>
											</a>												
											<a href="#" class="btn btn-flat ink-reaction" ng-click="removeFromCart(cartproduct.ID)">
												<i class="md md-delete"></i>
											</a>											
										 </li>
									</ul>
								</div><!--end .card-body -->
						    </div><!--end .card -->														
					</div><!--end .section-body -->
			
				</section>
				<!-- BEGIN BLANK SECTION -->
				
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>

				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN PRODUCTS -->
						<li>
							<a href="index.php" >
								<div class="gui-icon"><i class="md md-loyalty"></i></div>
								<span class="title">Products</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END PRODUCTS -->
						
						<!-- BEGIN BASKET -->
						<li>
							<a href="korpa.php" >
								<div class="gui-icon"><i class="md md-shopping-cart"></i></div>
								<span class="title">Cart</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END BASKET -->		
				

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->


				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->


		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->
		
		<!-- include angular js -->
		<script src="../assets/js/libs/angular/angular.min.js"></script>
		
		<!-- include angular notifications -->	
		<script src="../assets/js/libs/angular/angular-ui-notification.min.js"></script>	 	
		
		<!-- include angular animations -->	
		<script src="../assets/js/libs/angular/angular-animate.js"></script>	 
		
		<!-- my angular js codes will be here -->	
		<script src="../assets/js/libs/angular/app.js"></script>	

	</body>
</html>
